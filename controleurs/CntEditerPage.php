<?php
	require_once '/../modeles/ModLangue_Page.php';
	require_once '/../modeles/ModLangue_Menu.php';
	
	try{
		
		$bddLangue_Page = new Langue_Page;
		$bddLangue_Page->id_langue = $_GET["id_langue"];
		$bddLangue_Page->id_page = $_GET["id_page"];
		$reponse_page = $bddLangue_Page->recupererLangue_Page();
		
		$bddLangue_Menu = new Langue_Menu;
		$bddLangue_Menu->id_langue = $_GET["id_langue"];
		$reponse_menu = $bddLangue_Menu->afficherLangue_Menu();
		
		if(isset($_POST['titre_page']) || isset($_POST['soustitre_page']) || isset($_POST['contenu_page']) || isset($_POST['id_menu']) || isset($_POST['ordre']) || isset($_POST['visible'])){
			
			$bddLangue_Page->modifierLangue_Page(
			
				$_POST['titre_page'],
				$_POST['soustitre_page'],
				$_POST['contenu_page'],
				$_POST['id_menu'],
				$_POST['ordre'],
				$_POST['visible']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueEditerPage.php';
?>