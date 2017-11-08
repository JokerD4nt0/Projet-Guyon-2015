<?php
	require_once '/../modeles/ModLangue_Menu.php';
	require_once '/../modeles/ModLangue_Page.php';
	require_once '/../modeles/ModLangue_Article.php';
	
	try{
	
		$bddLangue_Menu = new Langue_Menu;
		$bddLangue_Menu->id_langue = $_GET['id_langue'];
		$reponse_menu = $bddLangue_Menu->afficherLangue_Menu();
		
		$bddLangue_Menu_left = new Langue_Menu;
		$bddLangue_Menu_left->id_langue = $_GET['id_langue'];
		$bddLangue_Menu_left->id_menu = $_GET['id_menu'];
		$reponse_menu_left = $bddLangue_Menu_left->recupererLangue_Menu();
		
		$bddLangue_Page = new Langue_Page;
		$bddLangue_Page->id_page = $_GET['id_page'];
		$bddLangue_Page->id_langue = $_GET['id_langue'];
		$reponse_page = $bddLangue_Page->collecterLangue_Page();
		
		$bddLangue_Page_left = new Langue_Page;
		$bddLangue_Page_left->id_langue = $_GET['id_langue'];
		$bddLangue_Page_left->id_menu = $_GET['id_menu'];
		$reponse_page_left = $bddLangue_Page_left->listerLangue_Page();
		
		$bddLangue_Article = new Langue_Article;
		$bddLangue_Article->id_langue = $_GET['id_langue'];
		if(array_key_exists('date', $_GET) && isset($_GET["date"])) {
	
			$bddLangue_Article->date = $_GET['date'];
			$reponse_article = $bddLangue_Article->findByDate();
		}else{
			$bddLangue_Article->id_page = $_GET['id_page'];
			$reponse_article = $bddLangue_Article->collecterLangue_Article();
		}
	
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/public/VuePage.php';
?>