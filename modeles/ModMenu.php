<?php
	require_once 'Modele.php';
	
	class Menu extends Modele{
	
		public function recupererMenu(){
		
			$requete="SELECT *
			FROM menu
			ORDER BY ordre;";
			$reponse = $this->executerRequete($requete);
			$menu=array();
			while($donnees = $reponse->fetch()){
			
				$menu[]=array()(
				
					$donnees['id_menu'],
					$donnees['icon'],
					$donnees['background'],
					$donnees['color'],
					$donnes['ordre']
				);
			}
			return $menu;
		}
	}
?>