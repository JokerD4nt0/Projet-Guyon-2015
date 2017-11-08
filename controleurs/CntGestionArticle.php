<?php
	require_once '/../modeles/ModLangue_Article.php';
	
	try{
	
		$bddLangue_Article = new Langue_Article;
		$bddLangue_Article->id_langue = $_GET["id_langue"];
		$reponse_article = $bddLangue_Article->afficherLangue_Article();
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueGestionArticle.php';
?>