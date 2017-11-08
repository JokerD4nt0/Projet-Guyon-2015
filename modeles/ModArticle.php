<?php
	require_once 'Modele.php';
	
	class Article extends Modele{
	
		public function ajouterArticle($icone_article,$lien_article,$date_debut,$date_fin,$position,$visible){
		
			$parametres =array(
			
				'icone_article' => $icone_article,
				'icone_pj' => $icone_pj,
				'date_debut' => $date_debut,
				'date_fin' => $date_fin,
				'position' => $position,
				'visible' => $visible,
			);
			$requete="INSERT INTO article(icone_article,icone_pj,date_debut,date_fin,position,visible)
			VALUES(:icone_article,:icone_pj,:date_debut,:date_fin,:position,:visible);";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function recupererArticle(){
		
			$requete="SELECT A.icone_article,icone_pj,date_debut,date_fin,position,visible,PA.id_article
			FROM article A, page_article PA
			WHERE PA.id_article = A.id_article;";
			$page=array();
			while($donnees = $reponse->fetch()){
			
				$page[]=array()(
				
					$donnees['icone_article'],
					$donnees['icone_pj'],
					$donnees['date_debut'],
					$donnees['date_fin'],
					$donnees['position'],
					$donnees['visible'],
				);
			}
			return $article;
		}
	}
?>