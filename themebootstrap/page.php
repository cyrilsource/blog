<?php


if (isset($_GET['id'])) {
	
	//définir variable id pour la clause where de l'article à afficher
	$id = $_GET['id'];

	require('../admin/config.php');
	require('../admin/modele/database.php');
	
	$pdo = getPDOLink($config);
	$pages = getPage($pdo, $id);
	
	include('header.php');
	include('navbar.php');
	
	foreach ($pages as $page){
		?>
		<div class="container">
			<h2><?php echo($page['titre']); ?></h2>
			<p><?php echo($page['texte']) ?></p>
		</div>
	<?php	
	}

	include('footer.php');

}

else {

	include('header.php');
	?>
	
	<h2>Cette page n'existe pas</h2>
	
	<?php  include('footer.php'); 
	
}
