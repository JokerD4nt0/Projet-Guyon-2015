<?php
	$titre="<h1>Gestion du diaporama</h1>";
	
	$contenu=
	'
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<form role="form" class="upload" method="post" action="?action=upload" enctype=\'multipart/form-data\'>
			<legend>Ajouter de nouvelles slides</legend>
			<div class="form-group">
				<label for="exampleInputFile">Selectionner des images</label>
				<input type="file" name="files[]" class="multi btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
				<p class="help-block">Fichiers au format .jpg ou .png</p>
			</div>
			<input type="hidden" name="action" value="upload"/>
			<button type="submit" class="btn btn-default">Envoyer</button>
		</form>
	<hr />
	<div id="sortable" style="overflow: hidden">
	';
	
	foreach($reponse_slider as $donnees_slider){
		
		$contenu.=
		'
			<div class="col-sm-3 col-md-3" id="'.$donnees_slider[3].'">
				<button type="button" class="btn btn-info btn-xs move-slide"><span class="glyphicon glyphicon-move"></span></button>
				<div class="thumbnail">
					<img src="img/slider/"'.$donnees_slider[0].'" alt="'.$donnees_slider[0].'" style="width: 100%; height: 100px"/>
					<div class="caption">
						<p>
							<span class="label label-success">Visible</span>
							<span class="label label-warning">Masquée</span>
						<div class="btn-group">								
							<button type="button" class="btn btn-default edit-slide"><span class="glyphicon glyphicon-pencil"></span></button>
							<button type="button" class="btn btn-danger delete-slide" data-id="'.$donnees_slider[3].'"><span class="glyphicon glyphicon-trash"></span></button>	
						</div>
						<input type="hidden" name="image" value="img/slider/"'.$donnees_slider[0].'"/>
						<input type="hidden" name="id" value="'.$donnees_slider[3].'"/>
						<input type="hidden" name="visible" value="'.$donnees_slider[2].'"/>
						<input type="hidden" name="ordre" value="'.$donnees_slider[1].'"/>
						</p>
					</div>
				</div>
			</div>
		';
	}
	
	$contenu.=
	'
	</div>
	';
	
	require_once "SqueletteAdmin.php";
?>


	<p>Aucune slides trouvées</p>
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
