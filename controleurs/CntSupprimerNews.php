<?php
	require_once '/../modeles/ModLangue_News.php';
	
	try{

		if(isset($_POST['id_news'])){
			
			$bddLangue_News = new Langue_News;
			$bddLangue_News->supprimerLangue_News(
			
				$_POST['id_news']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueSupprimerNews.php';
?>