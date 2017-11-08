<?php
	require_once '/../modeles/ModLangue_Page.php';
	require_once '/../modeles/ModLangue_Menu.php';
	
	try{
	
		$bddLangue_Menu = new Langue_Menu;
		$bddLangue_Menu->id_langue = $_GET["id_langue"];
		$reponse_menu = $bddLangue_Menu->afficherLangue_Menu();
	
		$bddLangue_Page = new Langue_Page;
		if(isset($_POST['id_menu'])){
		
			$bddLangue_Page->ajouterLangue_Page(
			
				$_POST['ordre'],
				$_POST['id_menu'],
				$_POST['url_page'],
				$_POST['titre_page'],
				$_POST['soustitre_page'],
				$_POST['contenu_page'],
				$_POST['visible']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueAjouterPage.php';
?>