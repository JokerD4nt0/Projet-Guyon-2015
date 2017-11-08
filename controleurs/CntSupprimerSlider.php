<?php
	require_once '/../modeles/ModSlider.php';
	
	try{
		
		if(isset($_POST['id_slider'])){
			
			$bddSlider = new Slider;
			$bddSlider->supprimerSlider(
			
				$_POST['id_slider']
			);
		}	
	}catch(Exception $e){
		
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueSupprimerSlider.php';
?>