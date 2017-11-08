<?php
	require_once '/../modeles/ModSlider.php';
	
	try{
	
		$bddSlider = new Slider;
		if(isset($_POST['image']) || isset($_POST['ordre']) || isset($_POST['visible'])){
		
			$bddSlider->ajouterSlider(

				$_POST['image'],
				$_POST['ordre'],
				$_POST['visible']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueAjouterSlider.php';
?>