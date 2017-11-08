<?php
	require_once '/../modeles/ModSlider.php';
	
	try{
	
		$bddSlider = new Slider;
		$bddSlider->id_langue = $_GET["id_langue"];
		$bddSlider->id_slider = $_GET["id_slider"];
		$reponse_slider = $bddSlider->recupererSlider();

		if(isset($_POST['image']) || isset($_POST['visible']) || isset($_POST['ordre'])){
			
			if(($_POST['image'] == "")){
			
				$bddSlider = new Slider;
				$bddSlider->id_slider = $_GET["id_slider"];
				$reponse_slider = $bddSlider->recupererSlider();
				
				foreach($reponse_slider as $donnees_slider){
				
					$_POST['image'].=$donnees_slider[0];
				}
			}
			
			$bddSlider->editerSlider(
			
				$_POST['image'],
				$_POST['ordre'],
				$_POST['visible']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueEditerSlider.php';
?>