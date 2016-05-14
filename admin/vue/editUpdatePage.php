<?php 

if (isset($_GET['id'])) {
	
	//définir variable id pour la clause where de la page à afficher
	$id = $_GET['id'];

	require('../config.php');
	require('../modele/database.php');
	
	$pdo = getPDOLink($config);
	$singleUpdatePages = getSinglePageUpdate($pdo, $id);
	$numberPages = getNumberPages($pdo);
	
	include('header.php');
	foreach ($singleUpdatePages as $singleUpdatePage){
	?>

<div class="container">
	<form class="form-horizontal" action="../controller/updatePage.php?id=<?php echo($id);?>" method="post">
		<fieldset>
		
		<!-- Form Name -->
		<legend>Mettre à jour votre page</legend>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="titre">Titre</label>  
		  <div class="col-md-5">
		  <input id="titre" name="titre" type="text"  value="<?php echo($singleUpdatePage['titre']) ?>" class="form-control input-md" autofocus required> 
		  </div><!--.col-md-5-->
		</div><!--.form-group-->
		
		<!--select de la  position dans laquelle la page va apparaître dans le menu-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="position">position dans le menu</label>
		  <div class="col-md-4">
		    <select id="position" name="position" class="form-control">
		    	     <?php for ($i = 0; $i <= $numberPages[0]; $i++) {?>
		    	     <option value="<?php echo($i); ?>"><?php echo($i); ?></option>
		    	     <?php } ?> 
		    </select>
		  </div><!--.col-md-4-->
		</div><!--.form-group-->	
			
		<!-- Textarea -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="texte">Contenu</label>
		  <div class="col-md-4">                     
		    <textarea class="form-control" id="Contenu" name="texte"><?php echo($singleUpdatePage['texte']) ?></textarea>
		  </div><!--.col-md-4-->
		</div><!--.form-group-->
		<input id="submit" name="submit" class="pull-right btn btn-primary btn-lg" type="submit" value="Publier" />
		</fieldset>
	</form>
</div><!--.container-->


<?php	
	}

	include('footer.php');

}

else {

	include('header.php');
	?>
	<div class="container">
		<h2>Votre page a été mise à jour</h2>
	</div><!--.container-->
	
	<?php  include('footer.php'); 
	
}
