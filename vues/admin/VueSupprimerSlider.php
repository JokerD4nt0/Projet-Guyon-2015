<?php
	$titre='
		<h2>Suppression d\'une image</h2>
	';
	
	$contenu=
	'
		<div class="notification-block">
			<?php echo $message ?>
		</div>
		<legend>Etes-vous sur de vouloir supprimer cette image ?</legend>
		<form method="POST">
			<div class="btn-group">
				<a href="index.php?page=GestionSlider&id_langue='.$_GET['id_langue'].'" class="btn btn-default">Retour</a>
				<input type="hidden" name="id_slider" value="'.$_GET['id_slider'].'"/>
				<input type="submit" class="btn btn-danger" value="Supprimer" />
			</div>
		</form>
	';
	
	if(isset($_POST['id_slider'])){
	
		$titre.='<br/><strong>L\'image a été correctement supprimée !</strong>';
	}
	
	$js="";
	
	require_once "squeletteAdmin.php";
?>