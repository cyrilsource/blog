<?php

require('../config.php');
require('../modele/database.php');


if (!empty($_POST['submit']) && !empty($_POST['titre']) && isset($_POST['extrait']) && isset($_POST['texte']))  {
	
	$titre = $_POST['titre'];
	$extrait = $_POST['extrait'];
	$texte = $_POST['texte'];
	
	$lengthExtrait = strlen($extrait);
	
	if ($lengthExtrait>140) {
		
		
		header('Location: ../vue/editPost.php?mess=error');
	}
	
	else {
		// on va arranger la chaine de caracteres $titre pour en faire un url
			$newChaine = trim(strtolower($titre));
		
			$Chainearray = explode(' ', $newChaine);
			
			$u = implode('-', $Chainearray);
			
			$url = str_replace('\'', '-', $u);
			
			
			addPost(getPDOLink($config), array(
				'titre' => $titre,
				'extrait' => $extrait,
				'texte' => $texte,
				'url' =>$url
			));
			
		header('Location: ../vue/editPost.php?mess=success');			
	}
	
}


