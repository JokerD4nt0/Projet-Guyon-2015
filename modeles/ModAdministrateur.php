<?php
	require_once 'Modele.php';
	
	class Administrateur extends Modele{
	
		public function recupererAdministrateur(){
		
			$requete = "SELECT * FROM administrateur;";
			$reponse_admin = $this->executerRequete($requete);
			$administrateur=array();
			while($donnees_admin = $reponse_admin->fetch()){
			
				$administrateur[]=array(
				
					$donnees_admin['id_admin'],
					$donnees_admin['login'],
					$donnees_admin['password']
				);
			}
			return $administrateur;
		}
	}
?>