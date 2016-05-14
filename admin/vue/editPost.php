<?php 
include('header.php');

?>
<div class="container">

	<?php 
	//afficher un message d'erreur pour signaler que nous avons trop de caractères dans l'extrait
	if (isset($_GET['mess'])) {
		
		$mess = $_GET['mess'];
		if ($mess === 'error') {?>
			<div class="container">
				<div class="text-center">
					<h4 style="color: #CC6666;">le choix de l'extrait est trop long. Maximum 140 car</h4>
				</div>
			</div>
		<?php	
		}
		if ($mess === 'success') {?>
			<div class="container">
				<div class="text-center">
					<h4 style="color: #33FF99;">votre article a bien été publié</h4>
				</div>
			</div>
		<?php	
		}
	}
	 ?>
	<form class="form-horizontal" action="../controller/insertionPost.php" method="post">
		<fieldset>
		
		<!-- Form Name -->
		<legend>Editer un article</legend>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="titre">Titre</label>  
		  <div class="col-md-5">
		  <input id="titre" name="titre" type="text" placeholder="Titre" class="form-control input-md" autofocus required> 
		  </div><!--.col-md-5-->
		</div><!--.form-group-->
		
		<!-- Textarea -->
		<div id="extraitForm" class="form-group">
		  <label class="col-md-4 control-label" for="extrait">Extrait</label>
		  <div class="col-md-4">                     
		    <textarea class="form-control" placeholder="extrait" id="extrait" name="extrait"></textarea>
		    <!-- affichage du message d'erreur à partir d'un script JS -->
		     <span class="help-block">Maximum 140 caractères</span>
		     <div id="caracError" class="alert alert-block alert-danger" style="display:none">
		           <h4>Attention</h4>
		           votre extrait fait plus de 140 caractères 
		     </div><!--#caracError-->
		  </div><!--.col-md-4-->
		</div><!--#extraitForm-->
		
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