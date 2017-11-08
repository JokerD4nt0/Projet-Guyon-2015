<?php
	require_once '/../modeles/ModPage_Article.php';
	require_once '/../modeles/ModLangue_Article.php';
	require_once '/../modeles/ModLangue.php';
	
	try{
	
		$bddPage = new Page_Article;
		$bddPage->id_langue = $_GET['id_langue'];
		$reponse_page = $bddPage->afficherPage();
		
		$bddLangue_Article = new Langue_Article;
		$bddLangue_Article->id_langue = $_GET['id_langue'];
		$reponse_article = $bddLangue_Article->afficherLangue_Article();
	
		$bddPage_Article = new Page_Article;
		$bddPage_Article->id_langue = $_GET['id_langue'];
		$reponse_pa = $bddPage_Article->afficherPage_Article();
		
		$bddPage_Article = new Page_Article;
		if(isset($_POST['id_page']) && isset($_POST['id_article'])){
		
			$bddPage_Article->ajouterPage_Article(
			
				$_POST['id_page'],
				$_POST['id_article'],
				$_POST['ordre']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueGestionPageArticle.php';
?>