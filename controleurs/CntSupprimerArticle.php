<?php
	require_once '/../modeles/ModLangue_Article.php';
	
	try{

		if(isset($_POST['id_article'])){
			
			$bddLangue_Article = new Langue_Article;
			$bddLangue_Article->supprimerLangue_Article(
			
				$_POST['id_article']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueSupprimerArticle.php';
?>