<?php
	$titre='<h1>Gestion des actualités <button type="button" class="btn btn-default add-news">Ajouter une News</button></h1>';
	
	$contenu=
	'
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
	';
			
	foreach($reponse_news as $donnees_news){
	
		$contenu.='
		
			<tr>
				<td>'.$donnees_news[2].'</td>
				<td>
						<span class="label label-success">Visible</span>
						<span class="label label-warning">Masquée</span>
				</td>
				<td>
					<input type="hidden" name="id" value="'.$donnees_news[0].'"/>
					<input type="hidden" name="visible" value="'.$donnees_news[4].'"/>
					<input type="hidden" name="content_fr" value="'.$donnees_news[2].'"/>
					<div class="btn-group">
						<button type="button" class="btn btn-default btn-sm edit-news"><span class="glyphicon glyphicon-pencil"></span></button>
						<button type="button" class="btn btn-danger btn-sm delete-news" data-id="'.$donnees_news[0].'"><span class="glyphicon glyphicon-trash"></span></button>
					</div>
				</td>
			</tr>
		';
	}
			
	$contenu.=
			'
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
							<h4 class="modal-title" id="myModalLabel">Ajout d\'une actualité</h4>
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
							<h4 class="modal-title" id="myModalLabel">Modification d\'une actualité</h4>
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
	';
	
	$js=
	'
		<script>
			$(document).ready(function(){
				
				$deleteModal = $(\'#delete-news-modal\');
				$addModal = $(\'#add-news-modal\');
				$editModal = $(\'#edit-news-modal\');
				
				$(\".delete-news\").on(\"click\", function(){
					id = $(this).data(\"id\");
					$deleteModal.modal(\"show\");
					
					$deleteModal.find(\"button.yes\").on("click", function(){
						window.location.href = "index.php?action=delete&id=" + id;
					});
				});
				
				$(".add-news").on("click", function(){
					$addModal.modal("show");
				});
				
				$(".edit-news").on("click", function(){
					
					container = $(this).parent().parent();
					
					id = $(container).find("input[name=\'id\']").val();
					content_fr = $(container).find("input[name=\'content_fr\']").val();
					visible = $(container).find("input[name=\'visible\']").val();
					
					$editModal.find("textarea[name=\'content_fr\']").val(content_fr);
					$editModal.find("input[name=\'id\']").val(id);
					
					if(visible == 1){
						$editModal.find("input[name=\'visible\']").attr("checked", "checked");
					}else{
						$editModal.find("input[name=\'visible\']").removeAttr("checked");
					}
					
					$editModal.modal("show");
				});
						
			});
		</script>
	';
	
	require_once "squeletteAdmin.php";
?>