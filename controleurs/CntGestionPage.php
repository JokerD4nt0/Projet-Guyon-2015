<?php
	require_once'/../modeles/ModLangue_Page.php';
	
	try{
	
		$bddLangue_Page = new Langue_Page;
		$bddLangue_Page->id_langue = $_GET["id_langue"];
		$bddLangue_Page->id_menu = $_GET["id_menu"];
		$reponse_page = $bddLangue_Page->afficherLangue_Page();
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueGestionPage.php';
?>