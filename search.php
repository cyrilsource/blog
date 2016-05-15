<?php


if (!empty($_POST['s']))  {
	
	$s = $_POST['s'];


	require('../admin/config.php');
	require('../admin/modele/database.php');
	
	$pdo = getPDOLink($config);
	$searchs = getSearch($pdo, $s);
	
	include('header.php');
	
	
	foreach ($searchs as $search){
		?>
		<div class="content">
		<!-- on teste ici si c'est un article ou une page pour attribuer les bon url -->
		<?php if ($search['type']==='po') {  ?>
			<a href="<?php echo($search['url']); ?>-<?php echo($search['id']); ?>"><h2><?php echo($search['titre']); ?></h2></a>
			<!-- on raccourcit la longueur du texte affiché -->
			<?php $texte = substr($search['texte'], 0,140) ?>
			<p><?php echo($texte) ?></p><a href="<?php echo($search['url']); ?>-<?php echo($search['id']); ?>"><p>lire la suite</p></a>
			<?php } 
			else { ?>
			<a href="<?php echo($search['url']); ?>_<?php echo($search['id']); ?>"><h2><?php echo($search['titre']); ?></h2></a>
			<!-- on raccourcit la longueur du texte affiché -->
			<?php $texte = substr($search['texte'], 0,140) ?>
			<p><?php echo($texte) ?></p><a href="<?php echo($search['url']); ?>-<?php echo($search['id']); ?>"><p>lire la suite</p></a>	
			<?php } ?>
			
			
			
		</div>
		
	<?php	
	}

	include('footer.php');

}

else {

	include('header.php');
	?>
	<section>
		<h2>Cette page n'existe pas</h2>
	</section>
	
	<?php  include('footer.php'); 
	
}
