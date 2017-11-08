<?php
	ob_start();

	require_once "../config.inc.php";
	
	$oTOOLS = TOOLS::getInstance();
	$oARTICLE = new ARTICLE;
	$oMENUS_ARTICLES = new MENUS_ARTICLES;
	$oMENU = new MENU;
	$message = null;
	
	if(isset($_GET["action"])){
		if($_GET["action"] == "reorder"){
			$i = 1;
			foreach($_POST["ids"] as $id){
				$article = new ARTICLE;
				$article->id = $id;
				$article->get();
				$article->ordre = $i;
				$article->update();
				unset($article);
				$i++;
			}
		die();
		
		$id_article = $_POST["id_article"];
		
		$oMENUS_ARTICLES->id_article = $id_article;
		}
	}
	
	$articles = $oARTICLE->find()->Objets();
	$menus_articles = $oMENUS_ARTICLES->find()->Objets();
	$menus = $oMENU->find("menu_parent is not null")->Objets();
?>
<h1>Gestion des articles 
<div class="btn-group">
	<a href="ajouter_article.php" class="btn btn-default btn-sm">Créer un article</a>
	<a href="ajouter_lien.php" class="btn btn-default btn-sm">Ajouter un article à une page</a>
</div>
</h1>
<div class="notification-block">
	<?php echo $message ?>
</div>
<hr />
<div class="table-responsive">
	<table class="table table-condensed table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Titre</th>
				<th>Visible</th>
				<th>Option</th>
				<th>Page maîtresse</th>
			</tr>		
		</thead>
		<tbody class="sortable">
			<?php if(!empty($articles)){ ?>
			<?php foreach($articles as $i => $article){ ?>
			<tr id="<?php echo $article->id; ?>">
				<td><button type="button" class="btn btn-info btn-xs move-article"><span class="glyphicon glyphicon-move"></span></button></td>
				<td><?php echo $article->title_fr; ?></td>
				<td>
					<?php if($article->visible == 1){ ?>
						<span class="label label-success">Visible</span>
					<?php }else{ ?>
						<span class="label label-warning">Masquée</span>
					<?php } ?>
				</td>
				<td>
					<div class="btn-group">
						<a href="modifier_article.php?id=<?php echo $article->id; ?>" class="btn btn-default btn-sm edit-article"><span class="glyphicon glyphicon-pencil"></span></a>
					</div>
				</td>
				<td>
				</td>
			</tr>
			<?php } ?>
			<?php }else{ ?>
			<tr>
				<td clospan="4">Aucun articles trouvés.</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	
	ob_start();
?>
<script>
	$(document).ready(function(){
		
		$("tbody.sortable").sortable({
			placeholder: "ui-state-highlight warning",
			cursor: "move",
			handle: ".move-article",
			cancel: "a",
			stop: function( event, ui ) {
				var ids = $(this).sortable("toArray");
				$.ajax({
					url: "index.php?action=reorder",
					data: {'ids[]' : ids},
					type: "POST"
				})
			}
		});			
	});
</script>
<?php
	$js = ob_get_contents();
	ob_end_clean();
	include LAYOUT;
?>