<?php
	require_once '/../modeles/ModLangue.php';
	
	try{
		
		$bddLangue = new Langue;
		$reponse_langue = $bddLangue->recupererLangue();
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueGestionLangue.php';
?>