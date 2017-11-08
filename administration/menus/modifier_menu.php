<?php
	ob_start();

	require_once "../config.inc.php";
	
	$oTOOLS = TOOLS::getInstance();
	
	$oMENU = new MENU;	
	$oMENU->id = $_GET["id"];
	$oMENU->get();
	
	$message = null;
	
	if(isset($_GET["action"])){
		if($_GET["action"] == "edit"){	
			
			$title_fr = $_POST["title_fr"];
			$color = $_POST["color"];
			
			if($_FILES['icon']['size'] > 0){	
				$tmp_name  = $_FILES['icon']['tmp_name'];
				$file_name = "icon-menu-chateau-roche-guyon-" . $oTOOLS->random_str(4) . "." . pathinfo($_FILES['icon']['name'], PATHINFO_EXTENSION);
				$path = ROOT . "img" . DS . "menu" . DS . "icon" . DS;
				$target = $path . $file_name;
				@unlink($path . $oMENU->icon);
				move_uploaded_file($tmp_name, $target);
				$oMENU->icon = $file_name;
			}
			
			if($_FILES['background']['size'] > 0){	
				$tmp_name  = $_FILES['background']['tmp_name'];
				$file_name = "background-menu-chateau-roche-guyon-" . $oTOOLS->random_str(4) . "." . pathinfo($_FILES['background']['name'], PATHINFO_EXTENSION);
				$path = ROOT . "img" . DS . "menu" . DS . "bg" . DS;
				$target = $path . $file_name;
				@unlink($path . $oMENU->background);
				move_uploaded_file($tmp_name, $target);
				$oMENU->background = $file_name;
			}
			
			$oMENU->title_fr = $title_fr;
			$oMENU->color = $color;		
			
			if($oMENU->update()){
				$message = NOTIFICATION::success("Opération réussie.");
			}else{
				$message = NOTIFICATION::error("Une erreur s'est produit lors de l'enregistrement des données.");
			}
		}
	}
?>
<h1>Modification d'une rubrique</h1>
<div class="notification-block">
	<?php echo $message ?>
</div>
<hr />
<form role="form" method="post" action="?action=edit&id=<?php echo $oMENU->id; ?>" enctype='multipart/form-data'>
	<div class="form-group">
		<label>Titre</label>
		<input type="text" class="form-control" name="title_fr" value="<?php echo $oMENU->title_fr ?>">
	</div>
	<div class="form-group">
		<label>Couleur du menu</label>
		<div id="colorSelector"><div style="background-color: #<?php echo $oMENU->color ?>"></div></div>
		<input type="hidden" class="form-control" name="color" value="<?php echo $oMENU->color ?>">
	</div>
	<div class="form-group">
		<label>Icône du menu</label>
		<input type="file" name="icon" class="btn-default" title="<span class='glyphicon glyphicon-upload'></span>">
		<p class="help-block">
			<em>Actuellement :</em>
			<img  width="128" height="128" src="<?php echo BASE_URL . "img/menu/icon/" . $oMENU->icon; ?>" alt="Aucun visuel" class="img-thumbnail">
		</p>
	</div>
	<div class="form-group">
		<label>Fond d'écran</label>
		<input type="file" name="background" class="btn-default" title="<span class='glyphicon glyphicon-upload'></span>">
		<p class="help-block">
			<em>Actuellement :</em>
			<img  width="128" height="128" src="<?php echo BASE_URL . "img/menu/bg/" . $oMENU->background; ?>" alt="Aucun visuel" class="img-thumbnail">
		</p>
	</div>
	<input type="submit" class="btn btn-default" value="Modifier" />
	<a href="index.php" class="btn btn-primary">Retour</a>
</form>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	
	ob_start();
?>
<script>
	$(document).ready(function(){
		
		$("#colorSelector").ColorPicker({
			color: "<?php echo $oMENU->color ?>",
			flat: true,
			onChange: function(hsb, hex, rgb){
				$("input[name='color']").val(hex);
			}
		});
						
	});
</script>
<?php
	$js = ob_get_contents();
	ob_end_clean();
	include LAYOUT;
?>