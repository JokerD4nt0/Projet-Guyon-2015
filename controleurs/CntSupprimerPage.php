<?php
	require_once '/../modeles/ModLangue_Page.php';
	
	try{
	
		$bddLangue_Page = new Langue_Page;
		$bddLangue_Page->id_menu = $_GET['id_menu'];

		if(isset($_POST['id_page'])){
			
			$bddLangue_Page = new Langue_Page;
			$bddLangue_Page->supprimerLangue_Page(
			
				$_POST['id_page']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueSupprimerPage.php';
?>