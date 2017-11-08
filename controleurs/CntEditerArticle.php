<?php
	require_once '/../modeles/ModLangue_Article.php';
	
	try{
	
		$bddLangue_Article = new Langue_Article;
		$bddLangue_Article->id_langue = $_GET["id_langue"];
		$bddLangue_Article->id_article = $_GET["id_article"];
		$reponse_article = $bddLangue_Article->recupererLangue_Article();
		
		if(isset($_POST['url_article']) || isset($_POST['titre_article']) || isset($_POST['soustitre_article']) || isset($_POST['type_evenement']) || isset($_POST['contenu_article']) || isset($_POST['libelle_article']) || isset($_POST['lien_pj']) || isset($_POST['icon_article']) || isset($_POST['icon_pj']) || isset($_POST['date_debut']) || isset($_POST['date_fin']) || isset($_POST['visible']) || isset($_POST['lien_pj2']) || isset($_POST['lien_pj3']) || isset($_POST['image']) || isset($_POST['image2']) || isset($_POST['image3']) || isset($_POST['image4']) || isset($_POST['image5']) || isset($_POST['image6']) || isset($_POST['icon_pj2']) || isset($_POST['icon_pj3'])){
			
			// persistance des données en cas de non-remplissage
			if(($_POST['icon_article'] == "") || ($_POST['icon_pj'] == "") || ($_POST['lien_pj'] == "") || ($_POST['lien_pj2'] == "") || ($_POST['lien_pj3'] == "") || ($_POST['image'] == "") || ($_POST['image2'] == "") || ($_POST['image3'] == "") || ($_POST['image4'] == "") || ($_POST['image5'] == "") || ($_POST['image6'] == "") || ($_POST['icon_pj2'] == "") || ($_POST['icon_pj3']) == ""){
			
				$bddLangue_Article = new Langue_Article;
				$bddLangue_Article->id_langue = $_GET["id_langue"];
				$bddLangue_Article->id_article = $_GET["id_article"];
				$reponse_article = $bddLangue_Article->recupererLangue_Article();
				
				foreach($reponse_article as $donnees_article){
				
					$_POST['icon_article'].=$donnees_article[2];
					$_POST['icon_pj'].=$donnees_article[9];
					$_POST['lien_pj'].=$donnees_article[11];
					$_POST['lien_pj2'].=$donnees_article[13];
					$_POST['lien_pj3'].=$donnees_article[14];
					$_POST['image'].=$donnees_article[15];
					$_POST['image2'].=$donnees_article[16];
					$_POST['image3'].=$donnees_article[17];
					$_POST['image4'].=$donnees_article[18];
					$_POST['image5'].=$donnees_article[19];
					$_POST['image6'].=$donnees_article[20];
					$_POST['icon_pj2'].=$donnees_article[21];
					$_POST['icon_pj3'].=$donnees_article[22];
				}
			}
			
			$bddLangue_Article->modifierLangue_Article(
			
				$_POST['url_article'],
				$_POST['titre_article'],
				$_POST['soustitre_article'],
				$_POST['type_evenement'],
				$_POST['contenu_article'],
				$_POST['libelle_pj'],
				$_POST['lien_pj'],
				$_POST['icon_article'],
				$_POST['icon_pj'],
				$_POST['date_debut'],
				$_POST['date_fin'],
				$_POST['visible'],
				$_POST['lien_pj2'],
				$_POST['lien_pj3'],
				$_POST['image'],
				$_POST['image2'],
				$_POST['image3'],
				$_POST['image4'],
				$_POST['image5'],
				$_POST['image6'],
				$_POST['icon_pj2'],
				$_POST['icon_pj3']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueEditerArticle.php';
?>