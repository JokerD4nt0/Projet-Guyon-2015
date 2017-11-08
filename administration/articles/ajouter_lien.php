<?php
	ob_start();
	
	require_once "../config.inc.php";
	
	$oTOOLS = TOOLS::getInstance();
	$oMENUS_ARTICLES = new MENUS_ARTICLES;
	$oMENU = new MENU;
	$oARTICLE = new ARTICLE;
	$message = null;
	
	if(isset($_GET["action"])){
		if($_GET["action"] == "add"){
		
			$id_menu = $_POST["id_menu"];
			$id_article = $_POST["id_article"];
			
			$oMENUS_ARTICLES->id_menu = $id_menu;
			$oMENUS_ARTICLES->id_article = $id_article;
			
			if($oMENUS_ARTICLES->add()){
				$message = NOTIFICATION::success("Opération réussie.");
			}else{
				$message = NOTIFICATION::error("Une erreur s'est produite lors de l'enregistrement des donn�es.");
			}
		}
	}
	
	$menus_articles = $oMENUS_ARTICLES->find()->Objets();
	$menus  = $oMENU->find("menu_parent is not null order by ordre")->Objets();
	$articles = $oARTICLE->find()->Objets();
?>
<h1>Lien d'une page et d'un article</h1>
<div class="notification-block">
	<?php echo $message ?>
</div>
<hr />
<form role="form" method="post" action="?action=add" enctype='multipart/form-data'>
	<div class="form-group">
		<label>Choix de la page</label>
		<select name="id_menu">
			<?php foreach($menus as $i => $menu){ ?>
				<option value="<?php echo $menu->id; ?>"><?php echo $menu->title_fr; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Choix de l'article</label>
		<select name="id_article">
			<?php foreach($articles as $i => $article){ ?>
				<option value="<?php echo $article->id; ?>"><?php echo $article->title_fr; ?></option>
			<?php } ?>
		</select>
	</div>
	<input type="submit" class="btn btn-default" value="Ajouter" />
	<a href="../articles/index.php" class="btn btn-primary">Retour</a>
</form>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	
	ob_start();
?>
<script>
</script>
<?php
	$js = ob_get_contents();
	ob_end_clean();
	include LAYOUT;
?>
	