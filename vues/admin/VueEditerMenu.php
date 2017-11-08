<?php
	$titre='<h2>Modification d\'un menu</h2>';
	
	$contenu='
	<div class="notification-block">
		<?php echo $message; ?>
	</div>
	<hr />
	<form method="POST">
		<div class="form-group">
			<label>Titre</label>
			<input type="text" class="form-control" name="titre_menu" value="
	';
	
	foreach($reponse_menu as $donnees_menu){
	
		$contenu.='
			'.$donnees_menu[2].'
		';
	}
	
	$contenu.='
			"/>
		</div>
		<div class="form-group">
			<label>Couleur du menu</label>
			<div id="colorSelector">
				<div style="background-color:
	';
		
	foreach($reponse_menu as $donnees_menu){
		
		$contenu.='
			#'.$donnees_menu[5].'
		';
	}
	
	$contenu.='
		"></div>
	</div>
		<input type="hidden" class="form-control" name="color" value="';
	
	foreach($reponse_menu as $donnees_menu){
	
		$contenu.=''.$donnees_menu[5].'';
	}
	
	$contenu.='"/>
		</div>
		<div class="form-group">
			<label>Icône du menu</label>
			<input type="file" name="icon" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			<p class="help-block">
				<em> Image en 128 * 128 uniquement !</em><br/>
				<em>Actuellement :</em>
				<img width="128" height="128" src="../../img/menu/icon/
	';
	
	foreach($reponse_menu as $donnees_menu){
	
		$contenu.='
		'.$donnees_menu[3].'
		';
	}
	
	$contenu.='
	" alt="Aucun visuel" class="img-thumbnail" />
			</p>
		</div>
		<div class="form-group">
			<label>Fond d\'écran</label>
			<input type="file" name="background" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			<p class="help-block">
				<em>Actuellement :</em>
				<img width="128" height="128" src="../../img/menu/bg/
	';
	
	foreach($reponse_menu as $donnees_menu){
	
		$contenu.='
			'.$donnees_menu[4].'
		';
	}
	
	$contenu.='
	" alt="Aucun visuel" class="img-thumbnail">
			</p>
		</div>
		<input type="submit" class="btn btn-default" value="Modifier" />
		<a href="index.php?page=GestionMenu&id_langue='.$donnees_menu[1].'" class="btn btn-primary">Retour</a>
	</form>
	<br/>
	';
	
	if(isset($_POST['titre_menu']) || isset($_POST['icon']) || isset($_POST['background']) || isset($_POST['color']) || isset($_POST['ordre'])){
	
		$titre.='<br/><strong>Le menu a été correctement modifié!</strong>';
	}
	
	$js='
		<script type="text/javascript">
			$(document).ready(function(){
				
				$("#colorSelector").ColorPicker({
					color: "';
	
	foreach($reponse_menu as $donnees_menu){
	
		$js.=''.$donnees_menu[5].'",';
	}
	
	$js.='
						flat: true,
						onChange: function(hsb, hex, rgb){
						$("input[name=\'color\']").val(hex);
					}
				});			
			
			});
		</script>
	';
	
	require_once 'squeletteAdmin.php';
?>