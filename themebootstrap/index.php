<?php
require('../admin/config.php');
require('../admin/modele/database.php');

$pdo = getPDOLink($config);
$posts = getPosts($pdo);

include('header.php');
include('navbar.php');

foreach ($posts as $post){
	?>
<div class="container">
	<div class="thumbnail">
		<a href="<?php echo($post['url']); ?>-<?php echo($post['id']); ?>"><h2><?php echo($post['titre']); ?></h2></a>
		<h4><?php echo($post['date']) ?></h4>
		<p><?php echo($post['extrait']) ?></p>
	</div>


</div>

<?php	
}




include('footer.php');