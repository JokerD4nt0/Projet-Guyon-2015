<?php
	$titre='
		<h2>Suppression d\'un lien</h2>
	';
	
	$contenu=
	'
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<legend>Etes-vous sur de vouloir supprimer définitivement ce lien ?</legend>
		<form method="POST">
			<div class="btn-group">
				<a href="index.php?page=GestionPageArticle&id_langue='.$_GET['id_langue'].'" class="btn btn-default">Retour</a>
				<input type="hidden" name="id_lien" value="'.$_GET['id_lien'].'"/>
				<input type="submit" class="btn btn-danger" value="Supprimer" />
			</div>
		</form>
	';
	
	if(isset($_POST['id_lien'])){
	
		$titre.='<br/><strong>Le lien a été correctement supprimé !</strong>';
	}
	
	$js="";
	
	require_once "squeletteAdmin.php";
?>