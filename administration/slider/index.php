<?php
	ob_start();

	require_once "../config.inc.php";
	
	$oTOOLS = TOOLS::getInstance();
	$oSLIDER = new SLIDER;	
	$message = null;
	
	if(isset($_GET["action"])){
		if($_GET["action"] == "upload"){
			$sliders = $oSLIDER->find("id is not null order by ordre")->Objets();
			$last_slide = end($sliders);
			$ordre = $last_slide->ordre;
			$todo = sizeof($_FILES["files"]["name"]);
			$count = 0;
			for($i = 0; $i < $todo; $i++){	
				$ordre++;
				$tmp_name  = $_FILES['files']['tmp_name'][$i];
				$file_name = "slide-chateau-roche-guyon-" . $oTOOLS->random_str(4) . "." . pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
				$path = ROOT . "img" . DS . "slider" . DS . $file_name;
				move_uploaded_file($tmp_name, $path);
				$oSLIDER->image = $file_name;
				$oSLIDER->ordre = $ordre;
				$oSLIDER->add();
			}
		}elseif($_GET["action"] == "delete"){
			$id = $_GET["id"];
			$slider = new SLIDER;
			$slider->id = $id;
			$slider->get();
			$path = ROOT . "img" . DS . "slider" . DS . $slider->image;
			@unlink($path);
			$slider->delete();
			$message = NOTIFICATION::success("Opération réussie.");
		}elseif($_GET["action"] == "edit"){
			$id = $_GET["id"];
			$visible = isset($_POST["visible"]) ? 1 : 0;
				
			$slider = new SLIDER;
			$slider->id = $id;
			$slider->get();
			$slider->visible = $visible;
			
			if($_FILES['image']['size'] > 0){	
				$tmp_name  = $_FILES['image']['tmp_name'];
				$file_name = "slide-chateau-roche-guyon-" . $oTOOLS->random_str(4) . "." . pathinfo($_FILES['image']['name'][$i], PATHINFO_EXTENSION);				
				$path = ROOT . "img" . DS . "slider" . DS;
				$target = $path . $file_name;
				@unlink($path . $slider->image);
				move_uploaded_file($tmp_name, $target);
				$slider->image = $file_name;
			}			
			
			if($slider->update()){
				$message = NOTIFICATION::success("Opération réussie.");
			}else{
				$message = NOTIFICATION::error("Une erreur s'est produit lors de l'enregistrement des données.");
			}
		}elseif($_GET["action"] == "reorder"){
			$i = 1;
			foreach($_POST["ids"] as $id){
				$slider = new SLIDER;
				$slider->id = $id;
				$slider->get();
				$slider->ordre = $i;
				$slider->update();
				unset($slider);
				$i++;
			}
			die();				
		}
	}
	
	$sliders = $oSLIDER->find("id is not null order by ordre")->Objets();	
	$ordre = (!empty($sliders)) ? end($sliders)->ordre : 1;
?>
<h1>Gestion du diaporama</h1>
<div class="notification-block">
	<?php echo $message ?>
</div>
<form role="form" class="upload" method="post" action="?action=upload" enctype='multipart/form-data'>
	<legend>Ajouter de nouvelles slides</legend>
	<div class="form-group">
		<label for="exampleInputFile">Selectionner des images</label>
		<input type="file" name="files[]" class="multi btn-default" title="<span class='glyphicon glyphicon-upload'></span>">
		<p class="help-block">Fichiers au format .jpg ou .png</p>
	</div>
	<input type="hidden" name="action" value="upload"/>
	<button type="submit" class="btn btn-default">Envoyer</button>
</form>
<hr />
<?php if(!empty($sliders)){ ?>
	<div id="sortable" style="overflow: hidden">
	<?php foreach($sliders as $i => $slider){ ?>
		<div class="col-sm-3 col-md-3" id="<?php echo $slider->id; ?>">
			<button type="button" class="btn btn-info btn-xs move-slide"><span class="glyphicon glyphicon-move"></span></button>
			<div class="thumbnail">
				<img src="<?php echo BASE_URL . "img/slider/" . $slider->image; ?>" alt="<?php echo $slider->image; ?>" style="width: 100%; height: 100px">
				<div class="caption">
					<p>
						<?php if($slider->visible){ ?>
						<span class="label label-success">Visible</span>
						<?php }else{ ?>
						<span class="label label-warning">Masquée</span>
						<?php } ?>
						<div class="btn-group">								
							<button type="button" class="btn btn-default edit-slide"><span class="glyphicon glyphicon-pencil"></span></button>
							<button type="button" class="btn btn-danger delete-slide" data-id="<?php echo $slider->id; ?>"><span class="glyphicon glyphicon-trash"></span></button>	
						</div>
						<input type="hidden" name="image" value="<?php echo BASE_URL . "img/slider/" . $slider->image; ?>"/>
						<input type="hidden" name="id" value="<?php echo $slider->id; ?>"/>
						<input type="hidden" name="visible" value="<?php echo $slider->visible; ?>"/>
						<input type="hidden" name="ordre" value="<?php echo $slider->ordre; ?>"/>
					</p>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
<?php }else{ ?>
	<p>Aucune slides trouvées</p>
<?php } ?>	
<div class="modal fade" id="delete-slide-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Attention</h4>
			</div>
			<div class="modal-body">
				Êtes vous sur de vouloir supprimer cette slide?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default yes" data-dismiss="modal">Oui</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Non</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="edit-slide-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
	<div class="modal-dialog">
		<form role="form" method="post" enctype='multipart/form-data'>
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Modification d'une slide</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Slide actuelle</label>
						<img src="" style="width: 100%"/>
					</div>
					<div class="form-group">
						<label>Changer la slide</label>
						<input type="file" name="image" class="btn-default" title="<span class='glyphicon glyphicon-upload'></span>">
					</div>			
					<div class="checkbox">
						<label>
							<input type="checkbox" name="visible"> Visible
						</label>
					</div>
				</div>
				<div class="modal-footer">
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
		
		$deleteModal = $('#delete-slide-modal');
		$editModal = $('#edit-slide-modal');
		
		$("#sortable").sortable({
			cursor: "move",
			handle: ".move-slide",
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
		
		var cancel = $( "#selector" ).sortable( "option", "cancel" );
		
		console.log(cancel);
		
		$("#sortable").disableSelection();
		
		$(".delete-slide").on("click", function(){
			id = $(this).data("id");
			$deleteModal.modal("show");
			
			$deleteModal.find("button.yes").on("click", function(){
				window.location.href = "index.php?action=delete&id=" + id;
			});
		});
		
		$(".edit-slide").on("click", function(){
			
			container = $(this).parent().parent();
			
			id = $(container).find("input[name='id']").val();
			image = $(container).find("input[name='image']").val();
			visible = $(container).find("input[name='visible']").val();
			ordre = $(container).find("input[name='ordre']").val();
			
			$editModal.find("img").attr("src", image);
			$editModal.find("form").attr("action", "index.php?action=edit&id=" + id);
			$editModal.find("select option").removeAttr("selected");
			$editModal.find("select option[value='" + ordre + "']").attr("selected", "selected");
			
			if(visible == 1){
				$editModal.find("input[name='visible']").attr("checked", "checked");
			}else{
				$editModal.find("input[name='visible']").removeAttr("checked");
			}
			
			$editModal.modal("show");
		});
		
		$("#sortable div.col-sm-3").mouseover(function(){
			$(this).find(".move-slide").css("display", "block");
		});
		
		$("#sortable div.col-sm-3").mouseleave(function(){
			$(this).find(".move-slide").css("display", "none");
		});
	});
</script>
<?php
	$js = ob_get_contents();
	ob_end_clean();
	include LAYOUT;
?>