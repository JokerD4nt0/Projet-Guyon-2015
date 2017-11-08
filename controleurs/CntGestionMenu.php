<?php
	require_once '/../modeles/ModLangue_Menu.php';
	require_once '/../modeles/ModLangue.php';
	
	
	try{
		
		$bddLangue = new Langue;
		$reponse_langue = $bddLangue->recupererLangue();
		
		if(isset($_GET['id_langue'])){
		
			$bddLangue = $_GET['id_langue'];
		}
	
		$bddLangue_Menu = new Langue_Menu;
		$bddLangue_Menu->id_langue = $_GET["id_langue"];
		$reponse_menu = $bddLangue_Menu->afficherLangue_Menu();
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueGestionMenu.php';
?>