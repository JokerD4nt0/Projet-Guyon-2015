<?php
	$titre='<h1>Page en cours de développement !</h1>';
	
	$contenu=
	'
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<legend>Gestion des utilisateurs de l\'interface d\'administration</legend>
		<div class="table-responsive">
			<table class="table table-condensed table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom d\'utilisateur</th>
						<th>Mot de passe</th>
					</tr>		
				</thead>
				<tbody class="sortable">
	
	';
	
	foreach($reponse_admin as $donnees_admin){
	
		$contenu.='
			<tr id_article="'.$donnees_admin[0].'">
				<td><button type="button" class="btn btn-info btn-xs move-menu"><span class="glyphicon glyphicon-move"></span></button></td>
				<td>'.$donnees_admin[1].'</td>
				<td>'.$donnees_admin[2].'</td>
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