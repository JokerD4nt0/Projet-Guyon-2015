<?php
	$titre='
		<h2>Suppression d\'un article</h2>
	';
	
	$contenu=
	'
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<legend>Etes-vous sur de vouloir supprimer définitivement cet article ?</legend>
		<form method="POST">
			<div class="btn-group">
				<a href="index.php?page=GestionArticle&id_langue='.$_GET['id_langue'].'" class="btn btn-default">Retour</a>
				<input type="hidden" name="id_article" value="'.$_GET['id_article'].'"/>
				<input type="submit" class="btn btn-danger" value="Supprimer" />
			</div>
		</form>
	';
	
	if(isset($_POST['id_article'])){
	
		$titre.='<br/><strong>L\'article a été correctement supprimé !</strong>';
	}
	
	$js="";
	
	require_once "squeletteAdmin.php";
?>