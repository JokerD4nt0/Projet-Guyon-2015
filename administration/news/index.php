<?php
	ob_start();

	require_once "../config.inc.php";
	
	$oTOOLS = TOOLS::getInstance();
	$oNEWS = new NEWS;	
	$message = null;
	
	if(isset($_GET["action"])){
		if($_GET["action"] == "delete"){
			$id = $_GET["id"];
			$news = new NEWS;
			$news->id = $id;
			$news->get();
			$news->delete();
			$message = NOTIFICATION::success("Suppression de la news réussie.");
		}elseif($_GET["action"] == "add"){
			$content_fr = $_POST["content_fr"];
			$visible = isset($_POST["visible"]) ? 1 : 0;
				
			$news = new NEWS;
			$news->content_fr = $content_fr;
			$news->visible = $visible;			
			
			if($news->add()){
				$message = NOTIFICATION::success("Opération réussie.");
			}else{
				$message = NOTIFICATION::error("Une erreur s'est produit lors de l'enregistrement des données.");
			}
		}elseif($_GET["action"] == "edit"){
			$id = $_POST["id"];
			$content_fr = $_POST["content_fr"];
			$visible = isset($_POST["visible"]) ? 1 : 0;
				
			$news = new NEWS;
			$news->id = $id;
			$news->get();
			$news->content_fr = $content_fr;
			$news->visible = $visible;			
			
			if($news->update()){
				$message = NOTIFICATION::success("Opération réussie.");
			}else{
				$message = NOTIFICATION::error("Une erreur s'est produit lors de l'enregistrement des données.");
			}
		}
	}
	
	$news = $oNEWS->find()->Objets();	
?>
<h1>Gestion des actualités <button type="button" class="btn btn-default add-news">Ajouter une News</button></h1>
<div class="notification-block">
	<?php echo $message ?>
</div>
<hr />
<div class="table-responsive">
	<table class="table table-condensed table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>Texte</th>
				<th>Visible</th>
				<th>Option</th>
			</tr>		
		</thead>
		<tbody>
			<?php if(!empty($news)){ ?>
			<?php foreach($news as $i => $item){ ?>
			<tr>
				<td><?php echo $item->content_fr; ?></td>
				<td>
					<?php if($item->visible == 1){ ?>
						<span class="label label-success">Visible</span>
					<?php }else{ ?>
						<span class="label label-warning">Masquée</span>
					<?php } ?>
				</td>
				<td>
					<input type="hidden" name="id" value="<?php echo $item->id; ?>"/>
					<input type="hidden" name="visible" value="<?php echo $item->visible; ?>"/>
					<input type="hidden" name="content_fr" value="<?php echo $item->content_fr; ?>"/>
					<div class="btn-group">
						<button type="button" class="btn btn-default btn-sm edit-news"><span class="glyphicon glyphicon-pencil"></span></button>
						<button type="button" class="btn btn-danger btn-sm delete-news" data-id="<?php echo $item->id; ?>"><span class="glyphicon glyphicon-trash"></span></button>
					</div>
				</td>
			</tr>
			<?php } ?>
			<?php }else{ ?>
			<tr>
				<td clospan="4">Aucune actualités trouvées.</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<div class="modal fade" id="delete-news-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Attention</h4>
			</div>
			<div class="modal-body">
				Êtes vous sur de vouloir supprimer cette actualité?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default yes" data-dismiss="modal">Oui</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Non</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="add-news-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
	<div class="modal-dialog">
		<form role="form" method="post" action="index.php?action=add">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Ajout d'une actualité</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Texte</label>
						<textarea class="form-control" name="content_fr"></textarea>
					</div>			
					<div class="checkbox">
						<label>
							<input type="checkbox" name="visible"> Visible
						</label>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-default" value="Ajouter" />
					<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Annuler</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="modal fade" id="edit-news-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
	<div class="modal-dialog">
		<form role="form" method="post" action="index.php?action=edit">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Modification d'une actualité</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Texte</label>
						<textarea class="form-control" name="content_fr"></textarea>
					</div>			
					<div class="checkbox">
						<label>
							<input type="checkbox" name="visible" /> Visible
						</label>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" />
					<input type="submit" class="btn btn-default" value="Modifier" />
					<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Annuler</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	
	ob_start();
?>
<script>
	$(document).ready(function(){
		
		$deleteModal = $('#delete-news-modal');
		$addModal = $('#add-news-modal');
		$editModal = $('#edit-news-modal');
		
		$(".delete-news").on("click", function(){
			id = $(this).data("id");
			$deleteModal.modal("show");
			
			$deleteModal.find("button.yes").on("click", function(){
				window.location.href = "index.php?action=delete&id=" + id;
			});
		});
		
		$(".add-news").on("click", function(){
			$addModal.modal("show");
		});
		
		$(".edit-news").on("click", function(){
			
			container = $(this).parent().parent();
			
			id = $(container).find("input[name='id']").val();
			content_fr = $(container).find("input[name='content_fr']").val();
			visible = $(container).find("input[name='visible']").val();
			
			$editModal.find("textarea[name='content_fr']").val(content_fr);
			$editModal.find("input[name='id']").val(id);
			
			if(visible == 1){
				$editModal.find("input[name='visible']").attr("checked", "checked");
			}else{
				$editModal.find("input[name='visible']").removeAttr("checked");
			}
			
			$editModal.modal("show");
		});
				
	});
</script>
<?php
	$js = ob_get_contents();
	ob_end_clean();
	include LAYOUT;
?>