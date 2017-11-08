<?php
	require_once 'Modele.php';
	
	class News extends Modele{
	
		public function ajouterNews($visible,$ordre){
		
			$parametres = array(
			
				'visible'=>$visible,
				'ordre'=>$ordre
			);
			$requete = "INSERT INTO news(visible,ordre)
			VALUES(:visible,:ordre);";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function recupererNews(){
		
			$requete = "SELECT *
			FROM news
			WHERE visible = 1
			ORDER BY ordre;";
			$news=array();
			while($donnees = $reponse->fetch()){
			
				$news[]=array(){
				
					$donnees['id_news'],
					$donnees['id_']
				}
			}
		}
		
		public function supprimerNews(){
		}
	}
?>