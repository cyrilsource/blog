<?php

if (isset($_GET['id'])) {
	
	//définir variable id pour la clause where de l'article à afficher
	$id = $_GET['id'];
	
	require('../config.php');
	require('../modele/database.php');
	
	
	if (!empty($_POST['submit']) && !empty($_POST['titre']) && isset($_POST['position']) && isset($_POST['texte']))  {
		$titre = $_POST['titre'];
		$position = $_POST['position'];
		$texte = $_POST['texte'];
		
		
		updatePage(getPDOLink($config), array(
			'titre' => $titre,
			'position' => $position,
			'texte' => $texte,
			'id' => $id
			
		
		));
		
	}
	
	
	header('Location: ../vue/editUpdatePage.php');
	
}