<?php
	require_once 'Modele.php';
	
	class Page_Article extends Modele{
	
		public $id_page;
		public $id_article;
	
		public function afficherPage_Article(){
		
			$requete="SELECT PA.ordre,id_lien, LP.titre_page, LA.titre_article, P.id_page, A.id_article
			FROM langue_page LP, langue_article LA, article A, page P, page_article PA, langue L
			WHERE LA.id_langue = L.id_langue
			AND LP.id_langue = L.id_langue
			AND PA.id_page = P.id_page
			AND PA.id_article = A.id_article
			AND A.id_article = LA.id_article
			AND P.id_page = LP.id_page
			AND L.id_langue = $this->id_langue
			ORDER BY PA.id_lien DESC;";
			$reponse_pa = $this->executerRequete($requete);
			$page_article=array();
			while($donnees_pa = $reponse_pa->fetch()){
			
				$page_article[]=array(
				
					$donnees_pa['id_article'],
					$donnees_pa['id_page'],
					$donnees_pa['titre_page'],
					$donnees_pa['titre_article'],
					$donnees_pa['ordre'],
					$donnees_pa['id_lien']
				);
			}
			return $page_article;
		}
		
		public function afficherPage(){
		
			$requete = "SELECT *
			FROM langue_page LP, langue L, page P
			WHERE LP.id_langue = L.id_langue
			AND P.id_page = LP.id_page
			AND P.visible = 1
			AND L.id_langue = $this->id_langue
			ORDER BY LP.titre_page ASC;";
			$reponse_page = $this->executerRequete($requete);
			$page = array();
			while($donnees_page = $reponse_page->fetch()){
			
				$page[] = array(
				
					$donnees_page['id_page'],
					$donnees_page['titre_page']
				);
			}
			return $page;
		}
		
		public function recupererPage_Article(){
		
			$requete="SELECT *
			FROM page_article
			ORDER by id_lien;";
			$reponse_pa = $this->executerRequete($requete);
			$page_article=array();
			while($donnees_pa = $reponse_pa->fetch()){
			
				$page_article[]=array(
				
					$donnees_pa['id_article'],
					$donnees_pa['id_page']
				);
			}
			return $page_article;
		}
		
		public function recupererPage_ArticleAdmin(){
		
			$requete="SELECT *
			FROM page_article
			WHERE id_lien = $this->id_lien
			ORDER by id_lien;";
			$reponse_pa = $this->executerRequete($requete);
			$page_article=array();
			while($donnees_pa = $reponse_pa->fetch()){
			
				$page_article[]=array(
				
					$donnees_pa['id_article'],
					$donnees_pa['id_page'],
					$donnees_pa['ordre']
				);
			}
			return $page_article;
		}
		
		public function ajouterPage_Article($id_page,$id_article,$ordre){
		
			$parametres = array(
			
				'id_page' => $id_page,
				'id_article' => $id_article,
				'ordre' => $ordre
			);
			
			$requete ="INSERT INTO page_article (id_page,id_article,ordre)
			VALUES (:id_page,:id_article,:ordre);";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function editerPage_Article($ordre){
		
			$parametres=array(
			
				'ordre' => $ordre
			);
			$requete = "UPDATE page_article
			SET ordre = :ordre
			WHERE id_lien = $this->id_lien;";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function supprimerPage_Article($id_lien){
		
			$parametres = array(
			
				'id_lien' => $id_lien
			);
			$requete = "DELETE FROM page_article
			WHERE id_lien = :id_lien;";
			return $this->executerRequete($requete,$parametres);
		}
	}
?>