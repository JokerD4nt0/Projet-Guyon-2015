<?php
	$titre=
	'
				<h2>Gestion des langues </h2>
	';
	
	$contenu=
	'
			<div class="notification-block">
			<?php echo $message ?>
		</div>
		<legend>Gestion des langues de traduction du site</legend>
		<div class="table-responsive">
			<table class="table table-condensed table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>ISO</th>
					</tr>		
				</thead>
				<tbody class="sortable">
	';
	
	foreach($reponse_langue as $donnees_langue){
	
		$contenu.='
			<tr id_article="'.$donnees_langue[0].'">
				<td><button type="button" class="btn btn-info btn-xs move-menu"><span class="glyphicon glyphicon-move"></span></button></td>
				<td>'.$donnees_langue[1].'</td>
				<td>'.$donnees_langue[2].'</td>
				<td>
					<div class="btn-group">
						<a href="" class="btn btn-default btn-sm edit-menus"><span class="glyphicon glyphicon-pencil"></span></a>
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
	
	$js='';
	
	require_once 'squeletteAdmin.php';
?>