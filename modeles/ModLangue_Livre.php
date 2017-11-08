<?php
	require_once "Modele.php";
	
	class Langue_Livre extends Modele{
	
		public function afficherLangue_Livre(){
		
			$requete = "SELECT * 
			FROM Langue_Livre LL, Langue La, Livre Li
			WHERE LL.id_langue = La.id_langue
			AND LL.id_livre = Li.id_Livre
			AND Li.id_page = 11
			ORDER BY Li.ordre";
			$reponse_Livre = $this->executerRequete($requete);
			$livre = array();
			while($donnees_livre = $reponse_livre){
			
				$livre[] = array()(
				
					$donnees_livre['id_langue_livre'],
					$donnees_livre['titre_livre'],
					$donnees_livre['couverture_livre'],
					$donnees_livre['image_livre'],
					$donnees_livre['auteur_livre'],
					$donnees_livre['ordre'],
					$donnees_livre['id_edition'],
					$donnees_livre['id_page'],
					$donnees_livre['id_livre'],
					$donnees_livre['id_langue']
				);
			}
			return $livre;
		}
		
		public function ajouterLangue_Livre($titre_livre,$couverture_livre,$id_livre,$id_langue){
		
			$parametres = array(
			
				'titre_livre' => $tite_livre,
				'couverture_livre' =>$couverture_livre,
				'id_livre' =>$id_livre,
				'id_langue' =>$id_langue
			);
			$requete = "INSERT INTO langue_livre(titre_livre,couverture_livre,id_livre,id_langue)
			VALUES (:titre_livre,couverture_livre,:id_livre,:id_langue);";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function editerLangue_Livre($id_langue_livre,$titre_livre,$couverture_livre,$livre,$langue){
		
			$parametres = array(
			
				'id_langue_livre' => $id_langue_livre,
				'titre_livre' => $titre_livre,
				'couverture_livre' => $couverture_livre,
				'id_livre' => $id_livre,
				'id_langue' => $id_langue,
			);
			$requete = "UPDATE langue_livre
			SET titre_livre = :titre_livre
			couverture_livre = :couverture_livre
			id_livre = :id_livre
			id_langue = :id_langue
			WHERE id_langue_livre = id_langue_livre;";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function supprimerLangue_Livre(){
		}
	}
?>