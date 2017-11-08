<?php
	require_once '/../modeles/ModSlider.php';
	
	try{
	
		$bddSlider = new Slider;
		$reponse_slider = $bddSlider->recupererSlider();
		
		/*$bddSlider = new Slider;
		if(isset($_POST['image'])){
		
			$bddSlider->ajouterSlider(
			
				$_POST['image'],
				$_POST['ordre'],
				$_POST['visible']
			);
		}
		
		$bddSlider = new Slider;
		if(isset($_POST['id_slider'])){
		
			$bddSlider->editerSlider(
			
				$_POST['id_slider'],
				$_POST['image'],
				$_POST['ordre'],
				$_POST['visible'],
			);
		}
		
		$bddSlider = new Slider;
		if(isset($_POST['id_slider'])){
		
			$bddSlider->supprimerSlider(
			
				$_POST['id_slider']
			);
		}*/
		
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueSlider.php';
?>