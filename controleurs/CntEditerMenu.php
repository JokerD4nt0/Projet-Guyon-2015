<?php
	require_once '/../modeles/ModLangue_Menu.php';
	
	
	try{
	
		$bddLangue_Menu = new Langue_Menu;
		$bddLangue_Menu->id_langue = $_GET["id_langue"];
		$bddLangue_Menu->id_menu = $_GET["id_menu"];
		$reponse_menu = $bddLangue_Menu->recupererLangue_Menu();
	
		if(isset($_POST['titre_menu']) || isset($_POST['icon']) || isset($_POST['background']) || isset($_POST['color'])){
			
			if(($_POST['icon'] == "") || ($_POST['background'] == "")){
			
				$bddLangue_Menu = new Langue_Menu;
				$bddLangue_Menu->id_langue = $_GET["id_langue"];
				$bddLangue_Menu->id_menu = $_GET["id_menu"];
				$reponse_menu = $bddLangue_Menu->recupererLangue_Menu();
				
				foreach($reponse_menu as $donnees_menu){
				
					$_POST['icon'].=$donnees_menu[3];
					$_POST['background'].=$donnees_menu[4];
				}
			}
			
			$bddLangue_Menu->modifierLangue_Menu(
			
				$_POST['titre_menu'],
				$_POST['icon'],
				$_POST['background'],
				$_POST['color']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueEditerMenu.php';
?>