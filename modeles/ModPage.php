<?php
	require_once 'Modele.php';
	
	class Page extends Modele{
	
		public function ajouterPage($id_menu,$visible,$ordre){
		
			$parametres = array(
			
				'id_menu'=>$id_menu,
				'visible'=>$visible,
				'ordre'=>$ordre
			);
			$requete="INSERT INTO page(id_menu,visible,ordre)
			VALUES(:id_menu,:visible,:ordre);";
			return $this->executerRequete($requete,$parametres);
		}
		
		public function recupererPage(){
		
			$requete="SELECT *
			FROM page P
			WHERE P.id_page = '$id_page';";
			$page=array();
			while($donnees = $reponse->fetch()){
			
				$page[]=array()(
				
					$donnees['id_page'],
					$donnees['id_menu'],
					$donnees['visible'],
					$donnes['ordre']
				);
			}
			return $page;	
		}
	}
?>