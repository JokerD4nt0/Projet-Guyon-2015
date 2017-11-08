<?php
	$titre=
	'
	<h2>Pages <a href="index.php?page=AjouterPage&id_langue='.$_GET['id_langue'].'" class="btn btn-default btn-sm">Ajouter une page</a></h2>

	';
	
	$contenu=
	'
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<legend>Gestion des pages et de leurs contenu</legend>
		<div class="table-responsive">
			<table class="table table-condensed table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Titre des pages</th>
						<th>url</th>
						<th>Statut</th>
						<th>Options</th>
					</tr>		
				</thead>
				<tbody class="sortable">
	';
	
	foreach($reponse_page as $donnees_page){
	
		$contenu.='
		<tr>
			<td><button type="button" class="btn btn-info btn-xs move-menu"><span class="glyphicon glyphicon-move"></span></button></td>
			<td>'.$donnees_page[3].'</td>
			<td>'.$donnees_page[2].'</td>
		';
		
		if($donnees_page[4] == 1){
				$contenu.='<td><span class="label label-success">Visible</span></td>';
		}else{
			$contenu.='<td><span class="label label-warning">Masquée</span></td>';
		}
		
		$contenu.='
			<td>
				<div class="btn-group">
					<a href="index.php?page=EditerPage&id_langue='.$donnees_page[1].'&id_page='.$donnees_page[0].'" class="btn btn-default btn-sm edit-menus"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="index.php?page=SupprimerPage&id_langue='.$_GET['id_langue'].'&id_menu='.$_GET['id_menu'].'&id_page='.$donnees_page[0].'"><button  type="button" class="btn btn-danger btn-sm delete-page" data-id=""><span class="glyphicon glyphicon-trash"></span></button></a>
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
		<a href="index.php?page=GestionMenu&id_langue='.$_GET['id_langue'].'" class="btn btn-primary">Retour</a>
	';
	
	$js=
	'
		<script>
			$(document).ready(function(){
				
				$("tbody.sortable").sortable({
					placeholder: "ui-state-highlight warning",
					cursor: "move",
					handle: ".move-menu",
					cancel: "a",
					stop: function( event, ui ) {
						var ids = $(this).sortable("toArray");
						$.ajax({
							url: "index.php?action=reorder",
							data: {\'ids[]\' : ids},
							type: "POST"
						})
					}
				});
								
			});
		</script>
	';
	
	require_once "squeletteAdmin.php";
?>