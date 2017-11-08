<?php
	require_once '/../modeles/ModLangue_News.php';
	
	try{
	
		$bddLangue_News = new Langue_News;
		$bddLangue_News->id_langue = $_GET["id_langue"];
		$bddLangue_News->id_news = $_GET["id_news"];
		$reponse_news = $bddLangue_News->recupererLangue_News();
		
		if(isset($_POST['contenu_news']) || isset($_POST['ordre']) || isset($_POST['visible'])){
			
			$bddLangue_News->modifierLangue_News(
			
				$_POST['contenu_news'],
				$_POST['visible'],
				$_POST['ordre']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueEditerNews.php';
?>