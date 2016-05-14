<?php 

require('../config.php');
require('../modele/database.php');

$pdo = getPDOLink($config);
$numberPages = getNumberPages($pdo);

include('header.php');

?>
<div class="container">
	<?php
	if (isset($_GET['mess'])) {
		
		$mess = $_GET['mess'];
		if ($mess === 'success') {?>
			<div class="container">
				<div class="text-center">
					<h4 style="color: #33FF99;">votre page a bien été publiée</h4>
				</div>
			</div>
		<?php	
		}
	}
	?>
	<form class="form-horizontal" action="../controller/insertionPage.php" method="post">
		<fieldset>
		
		<!-- Form Name -->
		<legend>Editer une page</legend>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="titre">Titre</label>  
		  <div class="col-md-5">
		  <input id="titre" name="titre" type="text" placeholder="Titre" class="form-control input-md" autofocus required>  
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
		     <span class="help-block">occurence de l'onglet dans la navbar</span>   
		  </div><!--.col-md-4-->
		</div><!--.form-group-->
			
		<!-- Textarea -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="texte">Contenu</label>
		  <div class="col-md-4">                     
		    <textarea class="form-control" placeholder="contenu" id="Contenu" name="texte"></textarea>
		  </div><!--.col-md-4-->
		</div><!--.form-group-->
		<input id="submit" name="submit" class="pull-right btn btn-primary btn-lg" type="submit" value="Publier" />
		</fieldset>
	</form>
</div><!--.container-->


<?php

include('footer.php');