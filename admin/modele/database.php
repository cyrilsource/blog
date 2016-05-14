<?php  
//connexion à la bdd et affichage des erreurs
function getPDOLink($config) {
	try {
		$dsn = 'mysql:dbname='.$config['database'].'; host='.$config['host'].';charset=utf8';
		$pdo = new PDO($dsn, $config['username'], $config['password']);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}
	catch (PDOException $exception) {
		//envoi d'un email en cas d'erreur
		mail('cyrilbron78@gmail.com', 'BDD Error', $exception->getMessage());
		exit('BDD Error Connection');
	}
}

/*fonctions pour la partie post de l'admin
--------------------------------------------
*/

//fonction pour ajouter un article dans la bdd
function addPost(PDO $pdo, $data) {
	$titre = $data['titre'];
	$extrait = $data['extrait'];
	$texte = $data['texte'];
	$url = $data['url'];
	$req = $pdo->prepare("INSERT INTO Articles (titre, date_publication, extrait, texte, url) VALUES (:titre, NOW(), :extrait, :texte, :url)");
	$req->execute(array(':titre'=>$titre, ':extrait'=>$extrait, ':texte'=>$texte, ':url'=>$url));
}

//fonction pour afficher les titres des posts sur la page d'acceuil de l'admin
function getPostAdmin(PDO $pdo) {
	$sql = "SELECT id, date_publication AS date, titre FROM Articles ORDER BY date DESC";
	$result =$pdo->query($sql);
	return $result->fetchAll();
}

//fonction pour supprimer un article
function deletePost(PDO $pdo, $id) {
	$req = $pdo->prepare("DELETE FROM Articles WHERE id = :id");
	$req->execute(array(':id'=>$id));
}

//fonction pour afficher le contenu d'un post sur la page de EditUpdate
function getSinglePostUpdate(PDO $pdo, $id) {
	$sql = "SELECT titre, extrait, texte FROM Articles WHERE id= ".$id."";
	$result =$pdo->query($sql);
	return $result->fetchAll();
}

//fonction pour mettre à jour les articles déjà publiés
function updatePost(PDO $pdo, $data) {
	$titre = $data['titre'];
	$extrait = $data['extrait'];
	$texte = $data['texte'];
	$id = $data['id'];
	$req = $pdo->prepare("UPDATE Articles SET titre = :titre, extrait = :extrait, texte = :texte WHERE id = :id");
	$req->execute(array(':titre'=>$titre, ':extrait'=>$extrait, ':texte'=>$texte, ':id'=>$id));
}


/*fonctions pour affichages des posts en front end
---------------------------------------------------
*/

//fonction pour afficher tous les posts sur la page d'accueil
function getPosts(PDO $pdo) {
	$sql = "SELECT id, DATE_FORMAT(date_publication, '%d/%m/%Y') AS date, titre, extrait, url FROM Articles ORDER BY date DESC";
	$result =$pdo->query($sql);
	return $result->fetchAll();
}

// fonction pour afficher un seul articles sur la pages single.php
function getSinglePost(PDO $pdo, $id) {
	$sql = "SELECT DATE_FORMAT(date_publication, '%e %M %Y') AS date, titre, texte FROM Articles WHERE id= ".$id."";
	// instruction pour mettre la date en français
	$result=$pdo->query("SET lc_time_names = 'fr_FR';");
	$result =$pdo->query($sql);
	return $result->fetchAll();
}


/*fonctions pour la partie page de l'admin
--------------------------------------------
*/

//fonction pour compter le nombre de pages pour afficher sur le select postion de editPages
function getNumberPages(PDO $pdo) {
	$sql = "SELECT COUNT(*) FROM Pages";
	$result =$pdo->query($sql);
	return $result->fetch();
}

//fonction qui sort tous les numeros de position des pages
function selectNumberPages(PDO $pdo) {
	$sql = "SELECT position FROM Pages";
	$result =$pdo->query($sql);
	return $result->fetchAll();
}

//fonction pour insérer une nouvelle page dans la bdd
function addPage(PDO $pdo, $data) {
	$titre = $data['titre'];
	$position = $data['position'];
	$texte = $data['texte'];
	$url = $data['url'];
	$req = $pdo->prepare("INSERT INTO Pages (titre, position, texte, url) VALUES (:titre, :position, :texte, :url)");
	$req->execute(array(':titre'=>$titre, ':position'=>$position, ':texte'=>$texte, ':url'=>$url));
}

function getItems(PDO $pdo) {
	$sql = "SELECT id, titre, position, url FROM Pages ORDER BY position";
	$result =$pdo->query($sql);
	return $result->fetchAll();
}

//pour afficher une page
function getPage(PDO $pdo, $id) {
	$sql = "SELECT titre, texte FROM Pages WHERE id= ".$id."";
	$result =$pdo->query($sql);
	return $result->fetchAll();
}

//fonction pour afficher les pages sur la page d'accueil de l'admin
function getPageAdmin(PDO $pdo) {
	$sql = "SELECT id,  titre, position FROM Pages ORDER BY position ";
	$result =$pdo->query($sql);
	return $result->fetchAll();
}

//fonction pour supprimer une page
function deletePage(PDO $pdo, $id) {
	$req = $pdo->prepare("DELETE FROM Pages WHERE id = :id");
	$req->execute(array(':id'=>$id));
}


//fonction pour afficher le contenu d'une page sur la page de EditUpdate
function getSinglePageUpdate(PDO $pdo, $id) {
	$sql = "SELECT titre, position, texte FROM Pages WHERE id= ".$id."";
	$result =$pdo->query($sql);
	return $result->fetchAll();
}

//fonction pour mettre à jour les pages déjà publiées
function updatePage(PDO $pdo, $data) {
	$titre = $data['titre'];
	$position = $data['position'];
	$texte = $data['texte'];
	$id = $data['id'];
	$req = $pdo->prepare("UPDATE Pages SET titre = :titre, position = :position, texte = :texte WHERE id = :id");
	$req->execute(array(':titre'=>$titre, ':position'=>$position, ':texte'=>$texte, ':id'=>$id));
}




