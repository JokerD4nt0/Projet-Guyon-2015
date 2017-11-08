<?php
	require_once '/../modeles/ModLangue_Menu.php';
	
	try{
	
		$bddLangue_Menu = new Langue_Menu;
		$reponse_menu = $bddLangue_Menu->recupererLangue_Menu();
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueMenu.php';
?>