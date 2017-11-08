<?php
	$titre='
		<h2>Articles
			<div class="btn-group">
				<a href="index.php?page=AjouterArticle&id_langue='.$_GET['id_langue'].'" class="btn btn-default btn-sm">Créer un article</a>
				<a href="index.php?page=GestionPageArticle&id_langue='.$_GET['id_langue'].'" class="btn btn-default btn-sm">Ajouter un article à une page</a>
			</div>
		</h2>
	';
	
	$contenu=
	'
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<legend>Gestion des articles et de leurs affichages dans les pages du site</legend>
		<div class="table-responsive">
			<table class="table table-condensed table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Titre des articles</th>
						<th>url</th>
						<th>Statut</th>
						<th>Options</th>
					</tr>		
				</thead>
				<tbody class="sortable">
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.='
			<tr>
				<td><button type="button" class="btn btn-info btn-xs move-article"><span class="glyphicon glyphicon-move"></span></button></td>
				<td>'.$donnees_article[4].'</td>
				<td>'.$donnees_article[2].'</td>
		';
		
		if($donnees_article[13] == 1){
			$contenu.='<td><span class="label label-success">Visible</span></td>';
		}else{
			$contenu.='<td><span class="label label-warning">Masquée</span></td>';
		}
		
		$contenu.='
				<td>
					<div class="btn-group">
						<a href="index.php?page=EditerArticle&id_langue='.$donnees_article[1].'&id_article='.$donnees_article[0].'" class="btn btn-default btn-sm edit-menus"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="index.php?page=SupprimerArticle&id_langue='.$_GET['id_langue'].'&id_article='.$donnees_article[0].'"><button  type="button" class="btn btn-danger btn-sm delete-article" data-id=""><span class="glyphicon glyphicon-trash"></span></button></a>
					</div>
				</td>
			</tr>
		';
	}
	
	$contenu.='
				</tbody>
			</table>
		</div>
	';
	
	$js="";
	
	require_once "squeletteAdmin.php";
?>