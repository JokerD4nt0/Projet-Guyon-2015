<?php
	$titre='
		<h2>Suppression d\'une actualité</h2>
	';
	
	$contenu=
	'
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<legend>Etes-vous sur de vouloir supprimer définitivement cette actualité ?</legend>
		<form method="POST">
			<div class="btn-group">
				<a href="index.php?page=GestionNews&id_langue='.$_GET['id_langue'].'" class="btn btn-default">Retour</a>
				<input type="hidden" name="id_news" value="'.$_GET['id_news'].'"/>
				<input type="submit" class="btn btn-danger" value="Supprimer" />
			</div>
		</form>
	';
	
	if(isset($_POST['id_news'])){
	
		$titre.='<br/><strong>L\'actualité a été correctement supprimée !</strong>';
	}
	
	$js="";
	
	require_once "squeletteAdmin.php";
?>