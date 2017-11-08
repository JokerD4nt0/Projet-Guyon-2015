<?php
	require_once "Modele.php";
	
	class edition extends Modele{
	
		public function afficherEdition(){
		
			$requete="SELECT * FROM edition
			ORDER BY id_edition;";
			$reponse_edition = $this->executerRequete($requete);
			$edition = array();
			while($donnees_edition = $reponse_edition->fetch()){
			
				$edition[] = array()(
				
					$donnees_edition['id_edition'],
					$donnees_edition['titre_edition'],
					$donnees_edition['lien_edition']
				);
			}
			return $edition;
		}
		
		public function ajouterEdition($titre_edition,$lien_edition){
		
			$parametres = array(
			
				'titre_edition' => $titre_edition,
				'lien_edition' => $lien_edition
			);
			$requete ="INSERT INTO edition(titre_edition,lien_edition)
			VALUES (:titre_edition,:lien_edition);";
		}
		
		public function editerEdition($id_edition,$titre_edition,$lien_edition){
		
			$parametres = array(
			
				'id_edition' => $titre_edition,
				'titre_edition' => $titre_edition,
				'lien_edition' => $lien_edition
			);
			$requete = "UPDATE edition
			SET titre_edition = :titre_edition
			lien_edition = :lien_edition
			WHERE id_edition = :id_edition;"
			return $this->executerRequete($requete,$parametres);
		}
		
		public function supprimerEdition($id_edition){
		
			$parametres = array(
			
				'id_edition' => $id_edition
			);
			$requete = "DELETE FROM edition
			WHERE id_edition = :id_edition;";
			return $this->executerRequete($requete,$parametres);
		}
	}
?>