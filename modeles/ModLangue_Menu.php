<?php
	require_once 'Modele.php';
	
	class Langue_Menu extends Modele{
	
		private $id_langue_menu;
		private $titre_menu;
		
		public $id_langue;
		public $id_menu;
		public $icon;
		public $color;
		public $ordre;
		
		public function afficherLangue_Menu(){
		
			$requete = "SELECT * 
			FROM langue_menu LM, menu M, langue L
			WHERE LM.id_menu = M.id_menu
			AND LM.id_langue = L.id_langue
			AND L.id_langue = $this->id_langue
			ORDER BY M.ordre;";
			$reponse_menu = $this->executerRequete($requete);
			$langue_menu=array();
			while($donnees_menu=$reponse_menu->fetch()){
			
				$langue_menu[]=array(
				
					$donnees_menu['id_menu'],
					$donnees_menu['id_langue'],
					$donnees_menu['titre_menu'],
					$donnees_menu['icon'],
					$donnees_menu['background'],
					$donnees_menu['color'],
					$donnees_menu['ordre']
				);
			}
			return $langue_menu;
		}
		
		public function recupererLangue_Menu(){
			
			$requete = "SELECT * 
			FROM langue_menu LM, menu M, langue L
			WHERE LM.id_menu = M.id_menu
			AND LM.id_langue = L.id_langue
			AND M.id_menu = $this->id_menu
			AND L.id_langue = $this->id_langue
			ORDER BY M.ordre;";
			$reponse_menu = $this->executerRequete($requete);
			$langue_menu = array();
			while($donnees_menu = $reponse_menu->fetch()){
			
				$langue_menu[] = array(
				
					$donnees_menu['id_menu'],
					$donnees_menu['id_langue'],
					$donnees_menu['titre_menu'],
					$donnees_menu['icon'],
					$donnees_menu['background'],
					$donnees_menu['color'],
					$donnees_menu['ordre']
				);
			}
			return $langue_menu;
		}
		
		public function modifierLangue_Menu($titre_menu,$icon,$background,$color){
		
			$parametres=array(
			
				'titre_menu' => $titre_menu,
				'icon' => $icon,
				'background' => $background,
				'color' => $color
			);
			$requete = "UPDATE langue_menu
			SET titre_menu = :titre_menu
			WHERE id_menu = $this->id_menu
			AND id_langue = $this->id_langue;
			UPDATE menu
			SET icon = :icon,
			background = :background,
			color = :color
			WHERE id_menu = $this->id_menu;";
			return $this->executerRequete($requete,$parametres);
		}
	}
?>