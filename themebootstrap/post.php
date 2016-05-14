<?php


if (isset($_GET['id'])) {
	
	//définir variable id pour la clause where de l'article à afficher
	$id = $_GET['id'];

	require('../admin/config.php');
	require('../admin/modele/database.php');
	
	$pdo = getPDOLink($config);
	$singlePosts = getSinglePost($pdo, $id);
	
	include('header.php');
	include('navbar.php');
	
	foreach ($singlePosts as $singlePost){
		?>
		<div class="container">
			<h2><?php echo($singlePost['titre']); ?></h2>
			<h4><?php echo($singlePost['date']) ?></h4>
			<p><?php echo($singlePost['texte']) ?></p>
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





