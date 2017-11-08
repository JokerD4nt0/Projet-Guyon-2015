<?php
	require_once '/../modeles/ModLangue_Article.php';
	
	try{
	
		$bddLangue_Article = new Langue_Article;
		if(isset($_POST['titre_article'])){
		
			$bddLangue_Article->ajouterLangue_Article(
			
				$_POST['icon_article'],
				$_POST['url_article'],
				$_POST['titre_article'],
				$_POST['soustitre_article'],
				$_POST['contenu_article'],
				$_POST['type_evenement'],
				$_POST['date_debut'],
				$_POST['date_fin'],
				$_POST['image'],
				$_POST['image2'],
				$_POST['image3'],
				$_POST['image4'],
				$_POST['image5'],
				$_POST['image6'],
				$_POST['libelle_pj'],
				$_POST['icon_pj'],
				$_POST['lien_pj'],
				$_POST['icon_pj2'],
				$_POST['lien_pj2'],
				$_POST['icon_pj3'],
				$_POST['lien_pj3'],
				$_POST['visible']
			);
		}
	}catch(Exception $e){
	
		echo "Erreur : " .$e->getMessage();
	}
	
	require_once '/../vues/admin/VueAjouterArticle.php';
?>