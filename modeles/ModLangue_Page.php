<?php
	require_once 'Modele.php';
	
	class Langue_Page extends Modele{
		
		public $id_langue;
		public $id_page;
		public $url_page;
		public $titre_page;
		public $visible;
		public $ordre;
		public $id_menu;
		public $titre_menu;
	
		public function afficherLangue_Page(){
		
			$requete = "SELECT * 
			FROM langue_page LP, page P, langue L
			WHERE LP.id_page = P.id_page
			AND LP.id_langue = L.id_langue
			AND L.id_langue = $this->id_langue
			AND P.id_menu = $this->id_menu
			ORDER BY P.ordre;";
			$reponse_page = $this->executerRequete($requete);
			$langue_page = array();
			while($donnees_page = $reponse_page->fetch()){
			
				$langue_page[] = array(
				
					$donnees_page['id_page'],
					$donnees_page['id_langue'],
					$donnees_page['url_page'],
					$donnees_page['titre_page'],
					$donnees_page['visible'],
					$donnees_page['id_menu']
				);
			}
			return $langue_page;
		}
		
		public function recupererLangue_Page(){
		
			$requete = "SELECT *,P.visible 
			FROM langue_page LP, page P, langue L, langue_menu LM
			WHERE LP.id_langue = L.id_langue
			AND LM.id_menu = P.id_menu
			AND LM.id_langue = L.id_langue
			AND LP.id_page = P.id_page
			AND P.id_page = $this->id_page
			AND L.id_langue = $this->id_langue
			ORDER BY P.ordre;";
			$reponse_page = $this->executerRequete($requete);
			$langue_page=array();
			while($donnees_page = $reponse_page->fetch()){
			
				$langue_page[]=array(
				
					$donnees_page['id_page'],
					$donnees_page['id_langue'],
					$donnees_page['url_page'],
					$donnees_page['titre_page'],
					$donnees_page['soustitre_page'],
					$donnees_page['contenu_page'],
					$donnees_page['keywords'],
					$donnees_page['description'],
					$donnees_page['id_menu'],
					$donnees_page['ordre'],
					$donnees_page['visible'],
					$donnees_page['titre_menu']
				);
			}
			return $langue_page;
		}
		
		public function collecterLangue_Page(){
		
			$requete = "SELECT *,P.visible 
			FROM langue_page LP, page P, langue L, langue_menu LM
			WHERE LP.id_langue = L.id_langue
			AND LM.id_menu = P.id_menu
			AND LM.id_langue = L.id_langue
			AND LP.id_page = P.id_page
			AND P.id_page = $this->id_page
			AND L.id_langue = $this->id_langue
			AND P.visible = 1
			ORDER BY P.ordre;";
			$reponse_page = $this->executerRequete($requete);
			$langue_page=array();
			while($donnees_page = $reponse_page->fetch()){
			
				$langue_page[]=array(
				
					$donnees_page['id_page'],
					$donnees_page['id_langue'],
					$donnees_page['url_page'],
					$donnees_page['titre_page'],
					$donnees_page['soustitre_page'],
					$donnees_page['contenu_page'],
					$donnees_page['keywords'],
					$donnees_page['description'],
					$donnees_page['id_menu'],
					$donnees_page['ordre'],
					$donnees_page['visible'],
					$donnees_page['titre_menu']
				);
			}
			return $langue_page;
		}
		
		public function listerLangue_Page(){
		
			$requete = "SELECT * 
			FROM langue_page LP, page P, langue L
			WHERE LP.id_page = P.id_page
			AND LP.id_langue = L.id_langue
			AND L.id_langue = $this->id_langue
			AND P.id_menu = $this->id_menu
			AND P.visible = 1
			ORDER BY P.ordre;";
			$reponse_page = $this->executerRequete($requete);
			$langue_page = array();
			while($donnees_page = $reponse_page->fetch()){
			
				$langue_page[] = array(
				
					$donnees_page['id_page'],
					$donnees_page['id_langue'],
					$donnees_page['url_page'],
					$donnees_page['titre_page'],
					$donnees_page['visible'],
					$donnees_page['id_menu']
				);
			}
			return $langue_page;
		}
		
		public function ajouterLangue_Page($ordre,$id_menu,$url_page,$titre_page,$soustitre_page,$contenu_page,$visible){
		
			$parametres=array(
			
				'ordre' => $ordre,
				'id_menu' => $id_menu,
				'url_page' => $url_page,
				'titre_page' => $titre_page,
				'soustitre_page' => $soustitre_page,
				'contenu_page' => $contenu_page,
				'visible' => $visible,
			);
			$requete = "INSERT INTO page(visible,ordre,id_menu)
			VALUES(:visible,:ordre,:id_menu);
			INSERT INTO langue_page(url_page,titre_page,soustitre_page,contenu_page,keywords,description,id_page,id_langue)
			VALUES (:url_page,:titre_page,:soustitre_page,:contenu_page,'','',(SELECT id_page FROM page ORDER BY id_page DESC LIMIT 1),1);";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function modifierLangue_Page($titre_page,$soustitre_page,$contenu_page,$id_menu,$ordre,$visible){
		
			$parametres=array(
			
				'titre_page' => $titre_page,
				'soustitre_page' => $soustitre_page,
				'contenu_page' => $contenu_page,
				'id_menu' => $id_menu,
				'ordre' => $ordre,
				'visible' => $visible
			);
			$requete = "UPDATE langue_page
			SET titre_page = :titre_page,
			soustitre_page = :soustitre_page,
			contenu_page = :contenu_page
			WHERE id_page = $this->id_page
			AND id_langue = $this->id_langue;
			UPDATE page
			SET visible = :visible,
			ordre = :ordre,
			id_menu = :id_menu
			WHERE id_page = $this->id_page;";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function supprimerLangue_Page($id_page){
		
			$parametres = array(
			
				'id_page' => $id_page
			);
			$requete = "DELETE FROM langue_page
			WHERE id_page = :id_page;
			DELETE FROM page_article
			WHERE id_page = :id_page;
			DELETE FROM page
			WHERE id_page = :id_page;";
			return $this->executerRequete($requete,$parametres);
		}
	}
?>