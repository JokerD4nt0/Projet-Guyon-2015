<?php
	$titre='<h2>Modification d\'une image du diaporama</h2>';
	
	$contenu='
		<div class="notification-block">
		<?php echo $message; ?>
	</div>
	<hr />
	<form method="POST">
		<div class="form-group">
			<label>Télécharger une image</label>
			<input type="file" name="image" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span> "/>
			<p class="help-block">
				<em>Actuellement :</em><br/>
				<img width="128" height="128" src="../../img/slider/';
	
	foreach($reponse_slider as $donnees_slider){
	
		$contenu.=''.$donnees_slider[0].'';
	}
	
	$contenu.='" alt="'.$donnees_slider[0].'"/>
		</p>
	</div>
	<div class="form-group">
		<label>Position de l\'image</label>
		<p class="help-block">
			<em>Position actuelle :</em>
	';
	
	foreach($reponse_slider as $donnees_slider){
		
		$contenu.=''.$donnees_slider[1].'';
	}
	
	$contenu.='</p><br/><select name="ordre">
			<option value="'.$donnees_slider[1].'">'.$donnees_slider[1].'</option>
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
		<label> Statut :</label>
		<p class="help-block">
			<em>Actuellement :</em>
	';
	
	foreach($reponse_slider as $donnees_slider){
	
		if($donnees_slider[2] == 1){
		
			$contenu.='<span class="label label-success">Visible</span>';
		}else{
		
			$contenu.='<span class="label label-warning">Masquée</span>';
		}
	}
	
	$contenu.='</p>
		<select name="visible">
	';
	
	foreach($reponse_slider as $donnees_slider){
	
		$contenu.='<option value="'.$donnees_slider[2].'">';
		
		if($donnees_slider[2] == 1){
			$contenu.='Visible</option>
			<option value="0">Masquée</option>';
		}else{
			$contenu.='Masquée</option>
			<option value="1">Visible</option>';
		}
	}
	
	$contenu.='</select>
	</div>
		<input type="submit" class="btn btn-default" value="Modifier" />
		<a href="index.php?page=GestionSlider&id_langue='.$_GET['id_langue'].'" class="btn btn-primary">Retour</a>
	</form>
	<br/>
	';
	
	if(isset($_POST['image']) || isset($_POST['ordre']) || isset($_POST['visible'])){
		
		$titre.='<br/><strong>L\'image a été correctement modifiée!</strong>';
	}
	
	$js='';
	
	require_once 'squeletteAdmin.php';
?>