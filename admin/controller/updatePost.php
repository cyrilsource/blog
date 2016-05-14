<?php

if (isset($_GET['id'])) {
	
	//définir variable id pour la clause where de l'article à afficher
	$id = $_GET['id'];
	
	require('../config.php');
	require('../modele/database.php');
	
	
	if (!empty($_POST['submit']) && !empty($_POST['titre']) && isset($_POST['extrait']) && isset($_POST['texte']))  {
		$titre = $_POST['titre'];
		$extrait = $_POST['extrait'];
		$texte = $_POST['texte'];
		
		
		updatePost(getPDOLink($config), array(
			'titre' => $titre,
			'extrait' => $extrait,
			'texte' => $texte,
			'id' => $id
			
		
		));
		
	}
	
	
	header('Location: ../vue/editUpdatePost.php');
	
}