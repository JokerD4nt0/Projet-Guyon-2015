<?php
	require_once '/../modeles/ModLangue_News.php';
	
	try{
	
		$bddLangue_News = new Langue_News;
		if(isset($_POST['contenu_news']) || isset($_POST['ordre']) || isset($_POST['visible'])){
		
			$bddLangue_News->ajouterLangue_News(

				$_POST['contenu_news'],
				$_POST['ordre'],
				$_POST['visible']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueAjouterNews.php';
?>