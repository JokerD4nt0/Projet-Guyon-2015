<?php
	require_once 'Modele.php';
	
	class Langue_News extends Modele{
	
		public $id_langue;
		public $id_news;
		public $ordre;
	
		public function ajouterLangue_News($contenu_news,$ordre,$visible){
		
			$parametres=array(
			
				'contenu_news' => $contenu_news,
				'ordre' => $ordre,
				'visible' => $visible
			);
			$requete = "INSERT INTO news(visible,ordre)
			VALUES(:visible,:ordre);
			INSERT INTO langue_news(contenu_news,id_langue,id_news) 
			VALUES(:contenu_news,1,(SELECT id_news FROM news ORDER BY id_news DESC LIMIT 1));";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function collecterLangue_News(){
		
			$requete = "SELECT * 
			FROM langue_news LN, news N, langue L
			WHERE LN.id_langue = L.id_langue
			AND LN.id_news = N.id_news
			AND L.id_langue = $this->id_langue
			AND N.visible = 1
			ORDER BY N.ordre;";
			$reponse_news = $this->executerRequete($requete);
			$langue_news=array();
			while($donnees_news = $reponse_news->fetch()){
			
				$langue_news[]=array(
				
					$donnees_news['id_news'],
					$donnees_news['id_langue'],
					$donnees_news['contenu_news'],
					$donnees_news['ordre'],
					$donnees_news['visible']
				);
			}
			return $langue_news;
		}
		
		public function recupererLangue_News(){
		
			$requete = "SELECT LN.id_news, L.id_langue, LN.contenu_news, N.ordre,visible 
			FROM langue_news LN, news N, langue L
			WHERE LN.id_langue = L.id_langue
			AND LN.id_news = N.id_news
			AND L.id_langue = $this->id_langue
			AND N.id_news = $this->id_news
			ORDER BY N.ordre;";
			$reponse_news = $this->executerRequete($requete);
			$langue_news=array();
			while($donnees_news = $reponse_news->fetch()){
			
				$langue_news[]=array(
				
					$donnees_news['id_news'],
					$donnees_news['id_langue'],
					$donnees_news['contenu_news'],
					$donnees_news['ordre'],
					$donnees_news['visible']
				);
			}
			return $langue_news;
		}
		
		
		public function afficherLangue_News(){
		
			$requete = "SELECT * 
			FROM langue_news LN, news N, langue L
			WHERE LN.id_langue = L.id_langue
			AND LN.id_news = N.id_news
			AND L.id_langue = $this->id_langue
			ORDER BY N.id_news;";
			$reponse = $this->executerRequete($requete);
			$langue_news=array();
			while($donnees = $reponse->fetch()){
			
				$langue_news[]=array(
				
					$donnees['id_news'],
					$donnees['id_langue'],
					$donnees['contenu_news'],
					$donnees['ordre'],
					$donnees['visible']
				);
			}
			return $langue_news;
		}
		
		public function modifierLangue_News($contenu_news,$visible,$ordre){
		
			$parametres=array(
			
				'contenu_news' => $contenu_news,
				'visible' => $visible,
				'ordre' => $ordre
			);
			$requete = "UPDATE langue_news
			SET contenu_news = :contenu_news
			WHERE id_news = $this->id_news
			AND id_langue = $this->id_langue;
			UPDATE news
			SET visible = :visible,
			ordre = :ordre
			WHERE id_news = $this->id_news;";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function supprimerLangue_News($id_news){
		
			$parametres = array(
			
				'id_news' => $id_news
			);
			$requete = "DELETE FROM langue_news
			WHERE id_news = :id_news;
			DELETE FROM news
			WHERE id_news = :id_news;";
			return $this->executerRequete($requete,$parametres);
		}
	}
?>