<?php
	require_once '/../modeles/ModLangue_News.php';
	
	try{
	
		$bddLangue_News = new Langue_News;
		$bddLangue_News->id_langue = $_GET["id_langue"];
		$reponse = $bddLangue_News->afficherLangue_News();
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueGestionNews.php';
?>