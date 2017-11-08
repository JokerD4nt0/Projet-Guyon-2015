<?php
	require_once '/../modeles/ModPage_Article.php';
	
	try{
		
	$bddPage_Article = new Page_Article;
	$bddPage_Article->id_lien = $_GET["id_lien"];
	$reponse_pa = $bddPage_Article->recupererPage_ArticleAdmin();
	
	if(isset($_POST['ordre'])){
		
		$bddPage_Article->editerPage_Article(
		
			$_POST['ordre']
		);
	}
	}catch(Exceoption $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueEditerPageArticle.php';
?>