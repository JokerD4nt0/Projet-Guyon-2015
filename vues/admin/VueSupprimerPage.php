<?php
	$titre='
		<h2>Suppression d\'une page</h2>
	';
	
	$contenu=
	'
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<legend>Etes-vous sur de vouloir supprimer définitivement cette page ?</legend>
		<form method="POST">
			<div class="btn-group">
				<a href="index.php?page=GestionPage&id_langue='.$_GET['id_langue'].'&id_menu='.$_GET['id_menu'].'" class="btn btn-default">Retour</a>
				<input type="hidden" name="id_page" value="'.$_GET['id_page'].'"/>
				<input type="submit" class="btn btn-danger" value="Supprimer" />
			</div>
		</form>
	';
	
	if(isset($_POST['id_page'])){
	
		$titre.='<br/><strong>La page a été correctement supprimée !</strong>';
	}
	
	$js="";
	
	require_once "squeletteAdmin.php";
?>