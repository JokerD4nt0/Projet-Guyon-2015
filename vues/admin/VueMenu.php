<?php
	$titre=
	'
		<h1>Gestion des rubriques <a href="" class="btn btn-default btn-sm">Ajouter une page</a></h1>

	';
	
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
						<th>#</th>
						<th>Titre</th>
						<th>Option</th>
					</tr>		
				</thead>
				<tbody class="sortable">
	';
	
	foreach($reponse_menu as $donnees_menu){
	
		$contenu.=
		'
			<tr id="'.$donnees_menu[0].'>
				<td><button type="button" class="btn btn-info btn-xs move-menu"><span class="glyphicon glyphicon-move"></span></button></td>
				<td>'.$donnees_menu[2].'</td>
				<td>
					<div class="btn-group">
						<a href="" class="btn btn-default btn-sm edit-menus"><span class="glyphicon glyphicon-pencil"></span></a>
						
							<a href="../evenements/" class="btn btn-default btn-sm edit-menus">Gestion des évènements</a>
						
							<a href="" class="btn btn-default btn-sm edit-menus">Gestion des pages</a>
					</div>
				</td>
			</tr>
		';
	
	}
	
	$contenu.=
	'
				<tr>
					<td clospan="4">Aucune rubriques trouvées.</td>
				</tr>
				</tbody>
			</table>
		</div>
	';
	
	require_once "squeletteAdmin.php";
?>