<?php
	require_once 'Modele.php';
	
	class Langue extends Modele{
	
		public $id_langue;
	
		public function ajouterLangue($nom_langue,$ISO,$active){
		
			$parametres=array(
			
				'nom_langue'=>$nom_langue,
				'ISO'=>$ISO,
				'active'=>$active
			);
			$requete = "INSERT INTO langue(nom_langue,ISO,active)
			VALUES (:nom_langue,:ISO,0);";
		}
	
		public function recupererLangue(){
		
			$requete = "SELECT * 
			FROM langue L;";
			$reponse_langue = $this->executerRequete($requete);
			$langue=array();
			while($donnees_langue = $reponse_langue->fetch()){
			
				$langue[]=array(
				
					$donnees_langue['id_langue'],
					$donnees_langue['nom_langue'],
					$donnees_langue['ISO']
				);
			}
			return $langue;
		}
	}

?>