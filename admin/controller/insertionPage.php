<?php


require('../config.php');
require('../modele/database.php');


if (!empty($_POST['submit']) && !empty($_POST['titre']) && isset($_POST['position']) && isset($_POST['texte']))  {
	$titre = $_POST['titre'];
	$position = $_POST['position'];
	$texte = $_POST['texte'];
	
	
	// on va arranger la chaine de caracteres $titre pour en faire un url
	$newChaine = trim(strtolower($titre));

	$Chainearray = explode(' ', $newChaine);
	
	$u = implode('-', $Chainearray);
	
	$url = str_replace('\'', '-', $u);
	
	
	addPage(getPDOLink($config), array(
			'titre' => $titre,
			'position' => $position,
			'texte' => $texte,
			'url' => $url
			
		));
		
	header('Location: ../vue/editPage.php?mess=success');
		
	
}


