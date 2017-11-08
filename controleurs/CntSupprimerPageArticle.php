<?php
	require_once '/../modeles/ModPage_Article.php';
	
	try{

		if(isset($_POST['id_lien'])){
			
			$bddPage_Article = new Page_Article;
			$bddPage_Article->supprimerPage_Article(
			
				$_POST['id_lien']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueSupprimerPageArticle.php';
?>