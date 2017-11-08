<?php
	require_once '/../modeles/ModSlider.php';
	
	try{
	
		$bddSlider = new Slider;
		$reponse_slider = $bddSlider->afficherSlider();
		
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueGestionSlider.php';
?>