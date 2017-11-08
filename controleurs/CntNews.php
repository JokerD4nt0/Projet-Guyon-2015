<?php
	require_once '/../modeles/ModLangue_News.php';
	
	try{
	
		$bddLangue_News = new Langue_News;
		$reponse_news = $bddLangue_News->recupererLangue_News();
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueNews.php';
?>