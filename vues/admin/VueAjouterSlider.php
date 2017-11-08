<?php
	$titre='<h2>Ajout d\'une image au diaporama</h2>';

	$contenu=
	'<div class="notification-block">
		<?php echo $message ?>
	</div>
	<form method="POST">
		<div class="form-group">
			<label for="exampleInputFile">Selectionner une image</label>
			<input type="file" name="image" class="multi btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>" />
			<p class="help-block">Fichiers au format .jpg ou .png</p>
		</div>
		<div class="form-group">
			<label>Position de l\'image dans le diaporama</label>
			<select name="ordre">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>
		<div class="form-group">
			<label> Statut </label>
			<select name="visible">
				<option value="1">Visible</option>
				<option value="0">Masquée</option>
			</select>
		</div>
		<input type="hidden" name="action" value="upload" />
		<button type="submit" class="btn btn-default">Envoyer</button>
		<a href="index.php?page=GestionSlider&id_langue='.$_GET['id_langue'].'" class="btn btn-primary">Retour</a>
	</form>
	<br />
	';
	
	if(isset($_POST['image']) || isset($_POST['visible']) || isset($_POST['ordre'])){
	
		$titre.="<br/><strong>L'image a été correctement enregistrée !</strong>";
	}
	
	$js='';
	
	require_once 'squeletteAdmin.php';
?>