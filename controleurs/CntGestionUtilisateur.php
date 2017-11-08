<?php
	require_once '/../modeles/ModAdministrateur.php';
	
	try{
		
		$bddAdministrateur = new Administrateur;
		$reponse_admin = $bddAdministrateur->recupererAdministrateur();
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueGestionUtilisateur.php';
?>