<?php



$items = getItems($pdo);

?>

<nav class="navbar navbar-full navbar-dark bg-success">
 	<div class="container">
	  <div class="navbar-full navbar-dark bg-success">
	  	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	  	  <span class="sr-only">Toggle navigation</span>
	  	  <span class="icon-bar"></span>
	  	  <span class="icon-bar"></span>
	  	  <span class="icon-bar"></span>
	  	</button>
	      
	    </div><!--.navbar-header-->
	    <div id="navbar" class="collapse navbar-collapse">
	        <ul class=" menu nav navbar-nav">
	             <?php foreach ($items as $item) {?>
	             	<li class="nav-item"><a href="<?php echo($item['url']); ?>_<?php echo($item['id']); ?>" class="nav-link"><?php echo($item['titre']); ?></a></li>		
	             <?php
	             }
	              ?>
	        </ul>
	        
	    </div><!--#navbar-->
	   
	 </div>
</nav>