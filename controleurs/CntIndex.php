<?php
	require_once '/../modeles/ModLangue_Menu.php';
	// require_once '/../modeles/ModLangue_Page.php';
	require_once '/../modeles/ModSlider.php';
	require_once '/../modeles/ModLangue_News.php';
	
	try{
	
		$bddLangue_Menu = new Langue_Menu;
		$bddLangue_Menu->id_langue = 1;
		// $bddLangue_Menu->id_menu = $_GET['id_menu'];
		$reponse_menu = $bddLangue_Menu->afficherLangue_Menu();
		
		$bddSlider = new Slider;
		$reponse_slider = $bddSlider->collecterSlider();
		
		$bddLangue_News = new Langue_News;
		$bddLangue_News->id_langue = 1;
		$reponse_news = $bddLangue_News->collecterLangue_News();
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}

	require_once '/../vues/public/VueIndex.php';
?>