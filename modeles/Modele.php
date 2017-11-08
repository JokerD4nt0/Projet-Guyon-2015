<?php
	abstract class Modele{
	
		private $bdd;
		
		protected function executerRequete($sql, $parametres = null){
		
			if ($parametres == null){
			
				$resultat = $this->getBdd()->query($sql);
			}else{
			
				$resultat = $this->getBdd()->prepare($sql);
				$resultat->execute($parametres);
			}
			return $resultat;
		}
		
		private function getBdd(){
		
			if ($this->bdd == null){
			
				try{
				
					$this->bdd = new PDO(
					
						'mysql:host=localhost;dbname=guyonV2;charset=utf8',
						'root',
						'',
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
					);
				}catch(Exception $e){
				
					echo "Erreur : " .$e->getMessage();
				}
			}
			return $this->bdd;
		}
	}
?>