<?php
	require_once 'Modele.php';
	
	class Langue_Article extends Modele{
	
		public $id_langue;
		public $id_article;
		public $id_page;
		public $icon_article;
		public $icon_pj;
		public $date_debut;
		public $date_fin;
		public $position;
		public $visible;
		public $date;
		public $image;
		public $image2;
		public $image3;
		public $image4;
		public $image5;
		public $image6;
		public $icon_pj2;
		public $icon_pj3;
		
		public function afficherLangue_Article(){
		
			$requete = "SELECT *,A.visible
			FROM langue_article LA, article A, langue L
			WHERE LA.id_langue = L.id_langue
			AND LA.id_article = A.id_article
			AND L.id_langue = $this->id_langue
			ORDER by LA.titre_article ASC;";
			$reponse_article = $this->executerRequete($requete);
			$langue_article=array();
			while($donnees_article = $reponse_article->fetch()){
			
				$langue_article[]=array(
				
					$donnees_article['id_article'],
					$donnees_article['id_langue'],
					$donnees_article['url_article'],
					$donnees_article['icon_article'],
					$donnees_article['titre_article'],
					$donnees_article['soustitre_article'],
					$donnees_article['type_evenement'],
					$donnees_article['contenu_article'],
					$donnees_article['date_debut'],
					$donnees_article['date_fin'],
					$donnees_article['icon_pj'],
					$donnees_article['libelle_pj'],
					$donnees_article['lien_pj'],
					$donnees_article['visible']
				);
			}
			return $langue_article;
		}
		
		public function recupererLangue_Article(){
		
			$requete = "SELECT DISTINCT LA.id_article, LA.url_article, A.icon_article, LA.titre_article, LA.soustitre_article, LA.type_evenement, LA.contenu_article, A.date_debut, A.date_fin, A.icon_pj, LA.libelle_pj, LA.lien_pj, A.visible, LA.lien_pj2, LA.lien_pj3, A.image, A.image2, A.image3, A.image4, A.image5, A.image6, A.icon_pj2, A.icon_pj3
			FROM langue_article LA, article A, langue L
			WHERE LA.id_langue = L.id_langue
			AND LA.id_article = A.id_article
			AND A.id_article = $this->id_article
			AND L.id_langue = $this->id_langue
			ORDER BY A.id_article;";
			$reponse_article = $this->executerRequete($requete);
			$langue_article=array();
			while($donnees_article = $reponse_article->fetch()){
			
				$langue_article[]=array(
				
					$donnees_article['id_article'],
					$donnees_article['url_article'],
					$donnees_article['icon_article'],
					$donnees_article['titre_article'],
					$donnees_article['soustitre_article'],
					$donnees_article['type_evenement'],
					$donnees_article['contenu_article'],
					$donnees_article['date_debut'],
					$donnees_article['date_fin'],
					$donnees_article['icon_pj'],
					$donnees_article['libelle_pj'],
					$donnees_article['lien_pj'],
					$donnees_article['visible'],
					$donnees_article['lien_pj2'],
					$donnees_article['lien_pj3'],
					$donnees_article['image'],
					$donnees_article['image2'],
					$donnees_article['image3'],
					$donnees_article['image4'],
					$donnees_article['image5'],
					$donnees_article['image6'],
					$donnees_article['icon_pj2'],
					$donnees_article['icon_pj3']
				);
			}
			return $langue_article;
		}
		
		public function collecterLangue_Article(){
		
			$requete = "SELECT *, PA.ordre
			FROM langue_article LA, article A, langue L, page_article PA, page P
			WHERE LA.id_article = A.id_article
			AND LA.id_langue = L.id_langue
			AND PA.id_article = A.id_article
			AND PA.id_page = P.id_page
			AND L.id_langue = $this->id_langue
			AND P.id_page = $this->id_page
			AND A.visible = 1
			ORDER BY PA.ordre;";
			$reponse_article = $this->executerRequete($requete);
			$langue_article = array();
			while($donnees_article = $reponse_article->fetch()){
			
				$langue_article[] = array(
				
					$donnees_article['id_article'],
					$donnees_article['id_langue'],
					$donnees_article['id_page'],
					$donnees_article['icon_article'],
					$donnees_article['icon_pj'],
					$donnees_article['date_debut'],
					$donnees_article['date_fin'],
					$donnees_article['ordre'],
					$donnees_article['visible'],
					$donnees_article['url_article'],
					$donnees_article['titre_article'],
					$donnees_article['soustitre_article'],
					$donnees_article['type_evenement'],
					$donnees_article['contenu_article'],
					$donnees_article['libelle_pj'],
					$donnees_article['lien_pj'],
					$donnees_article['lien_pj2'],
					$donnees_article['lien_pj3'],
					$donnees_article['image'],
					$donnees_article['image2'],
					$donnees_article['image3'],
					$donnees_article['image4'],
					$donnees_article['image5'],
					$donnees_article['image6'],
					$donnees_article['icon_pj2'],
					$donnees_article['icon_pj3']
				);
			}
			return $langue_article;
		}
		
		public function ajouterLangue_Article($icon_article,$url_article,$titre_article,$soustitre_article,$contenu_article,$type_evenement,$date_debut,$date_fin,$image,$image2,$image3,$image4,$image5,$image6,$libelle_pj,$icon_pj,$lien_pj,$icon_pj2,$lien_pj2,$lien_pj3,$icon_pj3,$visible){
		
			$parametres=array(
			
				'icon_article' => $icon_article,
				'url_article' => $url_article,
				'titre_article' => $titre_article,
				'soustitre_article' => $soustitre_article,
				'contenu_article' => $contenu_article,
				'type_evenement' => $type_evenement,
				'date_debut' => $date_debut,
				'date_fin' => $date_fin,
				'image' => $image,
				'image2' => $image2,
				'image3' => $image3,
				'image4' => $image4,
				'image5' => $image5,
				'image6' => $image6,
				'libelle_pj' => $libelle_pj,
				'icon_pj' => $icon_pj,
				'lien_pj' => $lien_pj,
				'icon_pj2' => $icon_pj2,
				'lien_pj2' => $lien_pj2,
				'icon_pj3' => $icon_pj3,
				'lien_pj3' => $lien_pj3,
				'visible' => $visible
			);
			$requete = "INSERT INTO article(icon_article,icon_pj,date_debut,date_fin,visible,icon_pj2,icon_pj3,image,image2,image3,image4,image5,image6)
			VALUES(:icon_article,:icon_pj,:date_debut,:date_fin,:visible,:icon_pj2,:icon_pj3,:image,:image2,:image3,:image4,:image5,:image6);
			INSERT INTO langue_article(url_article,titre_article,soustitre_article,type_evenement,contenu_article,libelle_pj,lien_pj,id_langue,id_article,lien_pj2,lien_pj3) 
			VALUES(:url_article,:titre_article,:soustitre_article,:type_evenement,:contenu_article,:libelle_pj,:lien_pj,1,(SELECT id_article FROM article ORDER BY id_article DESC LIMIT 1),:lien_pj2,:lien_pj3);";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function modifierLangue_Article($url_article,$titre_article,$soustitre_article,$type_evenement,$contenu_article,$libelle_pj,$lien_pj,$icon_article,$icon_pj,$date_debut,$date_fin,$visible,$lien_pj2,$lien_pj3,$image,$image2,$image3,$image4,$image5,$image6,$icon_pj2,$icon_pj3){
		
			$parametres=array(
			
				'url_article' => $url_article,
				'titre_article' => $titre_article,
				'soustitre_article' => $soustitre_article,
				'type_evenement' => $type_evenement,
				'contenu_article' => $contenu_article,
				'libelle_pj' => $libelle_pj,
				'lien_pj' => $lien_pj,
				'icon_article' => $icon_article,
				'icon_pj' => $icon_pj,
				'date_debut' => $date_debut,
				'date_fin' => $date_fin,
				'visible' => $visible,
				'lien_pj2' => $lien_pj2,
				'lien_pj3' => $lien_pj3,
				'image' => $image,
				'image2' => $image2,
				'image3' => $image3,
				'image4' => $image4,
				'image5' => $image5,
				'image6' => $image6,
				'icon_pj2' => $icon_pj2,
				'icon_pj3' => $icon_pj3
			);
			$requete = "UPDATE langue_article
			SET url_article = :url_article,
			titre_article = :titre_article,
			soustitre_article = :soustitre_article,
			type_evenement = :type_evenement,
			contenu_article = :contenu_article,
			libelle_pj = :libelle_pj,
			lien_pj = :lien_pj,
			lien_pj2 = :lien_pj2,
			lien_pj3 = :lien_pj3
			WHERE id_article = $this->id_article
			AND id_langue = $this->id_langue;
			UPDATE article
			SET icon_article = :icon_article,
			icon_pj = :icon_pj,
			date_debut = :date_debut,
			date_fin = :date_fin,
			visible = :visible,
			image = :image,
			image2 = :image2,
			image3 = :image3,
			image4 = :image4,
			image5 = :image5,
			image6 = :image6,
			icon_pj2 = :icon_pj2,
			icon_pj3 = :icon_pj3
			WHERE id_article = $this->id_article;";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function findByDate() {
			
			$requete = "SELECT *,PA.ordre
			FROM langue_article LA, article A, langue L, page P, page_article PA
			WHERE LA.id_article = A.id_article
			AND LA.id_langue = L.id_langue
			AND P.id_page = PA.id_page
			AND A.id_article = PA.id_article
			AND P.id_menu = 3
			AND L.id_langue = $this->id_langue
			AND $this->date BETWEEN A.date_debut AND A.date_fin
			ORDER BY PA.ordre;";
			$reponse_article = $this->executerRequete($requete);
			$langue_article = array();
			while($donnees_article = $reponse_article->fetch()){
			
				$langue_article[] = array(
				
					$donnees_article['id_article'],
					$donnees_article['id_langue'],
					$donnees_article['id_page'],
					$donnees_article['icon_article'],
					$donnees_article['icon_pj'],
					$donnees_article['date_debut'],
					$donnees_article['date_fin'],
					$donnees_article['ordre'],
					$donnees_article['visible'],
					$donnees_article['url_article'],
					$donnees_article['titre_article'],
					$donnees_article['soustitre_article'],
					$donnees_article['type_evenement'],
					$donnees_article['contenu_article'],
					$donnees_article['libelle_pj'],
					$donnees_article['lien_pj'],
					$donnees_article['lien_pj2'],
					$donnees_article['lien_pj3'],
					$donnees_article['image'],
					$donnees_article['image2'],
					$donnees_article['image3'],
					$donnees_article['image4'],
					$donnees_article['image5'],
					$donnees_article['image6'],
					$donnees_article['icon_pj2'],
					$donnees_article['icon_pj3']
				);
			}
			return $langue_article;
		}
		
		public function supprimerLangue_Article($id_article){
		
			$parametres = array(
			
				'id_article' => $id_article
			);
			$requete = "DELETE FROM langue_article
			WHERE id_article = :id_article;
			DELETE FROM page_article
			WHERE id_article = :id_article;
			DELETE FROM article
			WHERE id_article = :id_article;";
			return $this->executerRequete($requete,$parametres);
		}
	}
?>