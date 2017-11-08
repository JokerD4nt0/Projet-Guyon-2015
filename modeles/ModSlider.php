<?php
	require_once 'Modele.php';
	
	class Slider extends Modele{
		
		public $id_langue;
		public $id_slider;
	
		public function ajouterSlider($image,$ordre,$visible){
		
			$parametres = array(
			
				'image' => $image,
				'ordre' => $ordre,
				'visible' => $visible
			);
			$requete = "INSERT INTO slider (image,ordre,visible)
			VALUES (:image,:ordre,:visible);";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function afficherSlider(){
		
			$requete = "SELECT *
			FROM slider
			ORDER BY ordre;";
			$reponse_slider = $this->executerRequete($requete);
			$slider=array();
			while($donnees_slider = $reponse_slider->fetch()){
			
				$slider[]=array(
				
					$donnees_slider['image'],
					$donnees_slider['ordre'],
					$donnees_slider['visible'],
					$donnees_slider['id_slider']
				);
			}
			return $slider;
		}
		
		public function recupererSlider(){
		
			$requete = "SELECT *
			FROM slider
			WHERE id_slider = $this->id_slider
			ORDER BY ordre;";
			$reponse_slider = $this->executerRequete($requete);
			$slider=array();
			while($donnees_slider = $reponse_slider->fetch()){
			
				$slider[]=array(
				
					$donnees_slider['image'],
					$donnees_slider['ordre'],
					$donnees_slider['visible'],
					$donnees_slider['id_slider']
				);
			}
			return $slider;
		}
		
		public function collecterSlider(){
		
			$requete = "SELECT *
			FROM slider
			WHERE visible = 1
			ORDER BY ordre;";
			$reponse_slider = $this->executerRequete($requete);
			$slider=array();
			while($donnees_slider = $reponse_slider->fetch()){
			
				$slider[]=array(
				
					$donnees_slider['image'],
					$donnees_slider['ordre'],
					$donnees_slider['visible'],
					$donnees_slider['id_slider']
				);
			}
			return $slider;
		}
		
		public function editerSlider($image,$ordre,$visible){
		
			$parametres=array(
			
				'image' => $image,
				'ordre' => $ordre,
				'visible' => $visible
			);
			$requete = "UPDATE slider
			SET image = :image,
			ordre = :ordre,
			visible = :visible
			WHERE id_slider = $this->id_slider;";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function supprimerSlider($id_slider){
		
			$parametres=array(
			
				'id_slider' => $id_slider
			);
			$requete = "DELETE FROM slider
			WHERE id_slider = :id_slider;";
			return $this->executerRequete($requete,$parametres);
		}
	}
?>