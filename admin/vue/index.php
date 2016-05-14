<?php 

require('../config.php');
require('../modele/database.php');

$pdo = getPDOLink($config);
$postTitels = getPostAdmin($pdo);
$pageTitels = getPageAdmin($pdo);
include('header.php');
?>
<div class="jumbotron">
  <div class="container">
    <h1>Administration du site</h1>
    <p>Ici vous pouvez publiez des pages, des articles, modifier et supprimer</p>
    <p><a class="btn btn-primary btn-lg" href="editPost.php" role="button">Editer un article</a></p>
     <p><a class="btn btn-primary btn-lg" href="editPage.php" role="button">Editer une page</a></p>
  </div>
</div><!--.jumbotron-->
<div class="container">
	<div class="page-header">
		<h2>mes articles</h2>
	</div><!--.page-header-->
</div><!--.container-->


<div class="container">

	<table class="table table-bordered table-striped table-condensed">
	   <tbody>
		   <?php foreach ($postTitels as $postTitel){
		   	  	  ?>
		   
		   		<tr>
		   		 <td><h4><?php echo($postTitel['titre']); ?></h4></td> 		   		  
	          	<td><a onclick="return confirm('Etes-vous sûr de vouloir supprimer cet article?')" href="../controller/deletePost.php?id=<?php echo($postTitel['id']); ?>">supprimer</a></td>
	          	<td><a href="editUpdatePost.php?id=<?php echo($postTitel['id']); ?>">modifier</a></td>
	          </tr>
	       <?php	
	       }
	       ?>   
	    </tbody>
	</table>
	
	<div class="container">
		<div class="page-header">
			<h2>mes pages</h2>
		</div><!--.page-header-->
	</div><!--.container-->
	<table class="table table-bordered table-striped table-condensed">
	   <tbody>
		   <?php foreach ($pageTitels as $pageTitel){
		   	  	  ?>
		   
		   		<tr>
		   		 <td><h4><?php echo($pageTitel['titre']); ?></h4></td>
		   		 <td><h4><?php echo($pageTitel['position']); ?></h4></td> 		   		  
	          	<td><a onclick="return confirm('Etes-vous sûr de vouloir supprimer cette page?')" href="../controller/deletePage.php?id=<?php echo($pageTitel['id']); ?>">supprimer</a></td>
	          	<td><a href="editUpdatePage.php?id=<?php echo($pageTitel['id']); ?>">modifier</a></td>
	          </tr>
	       <?php	
	       }
	       ?>   
	    </tbody>
	</table>
	
</div>

<?php




include('footer.php');