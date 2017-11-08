<?php

	require_once "/../../modeles/ModLangue_Article.php";
	
	if(array_key_exists('date', $_GET) && isset($_GET["date"])) {
	
		$modele = new Langue_Article;
		$articles = $modele->findByDate($_GET["date"]);
		
		foreach($articles as $article)
			require_once "";
	}
?>