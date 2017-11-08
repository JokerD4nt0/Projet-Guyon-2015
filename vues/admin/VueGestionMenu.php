<?php
	$titre=
	'
		<h2>Menus <a href="index.php?page=AjouterPage&id_langue='.$_GET['id_langue'].'" class="btn btn-default btn-sm">Ajouter une page</a></h2>

	';
	
	$contenu=
	'
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<legend>Gestion des menus et du contenu des pages du site</legend>
		<div class="table-responsive">
			<table class="table table-condensed table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Titre des menus</th>
						<th>Options</th>
					</tr>		
				</thead>
				<tbody class="sortable">
	';
		
	foreach($reponse_menu as $donnees_menu){
		
		$contenu.=
		'
		<tr>
				<td><button type="button" class="btn btn-info btn-xs move-menu"><span class="glyphicon glyphicon-move"></span></button></td>
			<td>'.$donnees_menu[2].'</td>
			<td>
				<div class="btn-group">
					<a href="index.php?page=EditerMenu&id_langue='.$donnees_menu[1].'&id_menu='.$donnees_menu[0].'" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="index.php?page=GestionPage&id_langue='.$donnees_menu[1].'&id_menu='.$donnees_menu[0].'" class="btn btn-default btn-sm edit-pages">Gestion des pages</a>
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