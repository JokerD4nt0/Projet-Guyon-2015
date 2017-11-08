<?php
	require_once"session.php";
	require_once "/../modeles/ModLangue.php";
	
	try{
	
		$bddLangue = new Langue;
		// $bdd_Langue->id_langue = 1;
		$reponse_langue = $bddLangue->recupererLangue();
		
		if(isset($_GET['id_langue'])){
		
			$bddLangue = $_GET['id_langue'];			
		}
		
	}catch(Exception $e){
		
		echo "Erreur : " .$e->getMessage();
	}
	
	// require_once"/../vues/admin/squeletteAdmin.php";
	require_once"/../vues/admin/VueAdministration.php";
?>