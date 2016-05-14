<?php 

if (isset($_GET['id'])) {
	
	//définir variable id pour la clause where de l'article à afficher
	$id = $_GET['id'];

	require('../config.php');
	require('../modele/database.php');
	
	$pdo = getPDOLink($config);
	$singleUpdatePosts = getSinglePostUpdate($pdo, $id);
	
	include('header.php');
	foreach ($singleUpdatePosts as $singleUpdatePost){
	?>

	<div class="container">
		<form class="form-horizontal" action="../controller/updatePost.php?id=<?php echo($id);?>" method="post">
			<fieldset>
			
			<!-- Form Name -->
			<legend>Mettre à jour votre article</legend>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="titre">Titre</label>  
			  <div class="col-md-5">
			  <input id="titre" name="titre" type="text"  value="<?php echo($singleUpdatePost['titre']) ?>" class="form-control input-md" autofocus required> 
			  </div><!--.col-md-5-->
			</div><!--.form-group-->
			
			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="extrait">Extrait</label>
			  <div class="col-md-4">                     
			    <textarea class="form-control" id="extrait" name="extrait"><?php echo($singleUpdatePost['extrait']) ?></textarea>
			  </div><!--.col-md-4-->
			</div><!--.form-group-->
			
			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="texte">Contenu</label>
			  <div class="col-md-4">                     
			    <textarea class="form-control" id="Contenu" name="texte"><?php echo($singleUpdatePost['texte']) ?></textarea>
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
		<h2>Votre article a été mis à jour</h2>
	</div><!--.container-->
	
	<?php  include('footer.php'); 
	
}
