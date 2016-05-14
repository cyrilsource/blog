<?php

if (isset($_GET['id'])) {
	
	$id = $_GET['id'];

require('../config.php');
require('../modele/database.php');

deletePost(getPDOLink($config), $id);
	
header('Location: ../vue/index.php');
	
}

else {

	include('header.php');
	?>
	
	<h2>Erreur</h2>
	
	<?php  include('footer.php'); 
	
}

