<?php
	$titre='<h2>Actualités <a href="index.php?page=AjouterNews&id_langue='.$_GET['id_langue'].'" class="btn btn-default add-news">Ajouter une actualité</a></h2>';
	
	$contenu=
	'
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<legend>Gestion des actualités de la page d\'accueil</legend>
		<div class="table-responsive">
			<table class="table table-condensed table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>Texte</th>
						<th>Statut</th>
						<th>Position</th>
						<th>Option</th>
					</tr>		
				</thead>
				<tbody>
	';
			
	foreach($reponse as $donnees){
	
		$contenu.='
		
			<tr>
				<td>'.$donnees[2].'</td>
		';
		
		if($donnees[4] == 1){
			$contenu.='<td><span class="label label-success">Visible</span></td>';
		}else{
			$contenu.='<td><span class="label label-warning">Masquée</span></td>';
		}
		
		$contenu.='
				<td>'.$donnees[3].'</td>
				<td>
					<div class="btn-group">
						<a href="index.php?page=EditerNews&id_langue='.$donnees[1].'&id_news='.$donnees[0].'" class="btn btn-default btn-sm edit-news"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="index.php?page=SupprimerNews&id_langue='.$donnees[1].'&id_news='.$donnees[0].'"><button type="button" class="btn btn-danger btn-sm delete-news"><span class="glyphicon glyphicon-trash"></span></button></a>
					</div>
				</td>
			</tr>
		';
	}
	
	$contenu.='</tbody>
		</table>
	</div>';
	
	$js='';
	
	require_once "squeletteAdmin.php";
?>