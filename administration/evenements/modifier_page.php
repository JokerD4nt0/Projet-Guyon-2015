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
			$content_fr = $_POST["content_fr"];
			$visible = isset($_POST["visible"]) ? 1 : 0;
			
			if($_FILES['icon']['size'] > 0){	
				$tmp_name  = $_FILES['icon']['tmp_name'];
				$file_name = "icon-menu-chateau-roche-guyon-" . $oTOOLS->random_str(4) . "." . pathinfo($_FILES['icon']['name'], PATHINFO_EXTENSION);
				$path = ROOT . "img" . DS . "menu" . DS . "icon" . DS;
				$target = $path . $file_name;
				@unlink($path . $oMENU->icon);
				move_uploaded_file($tmp_name, $target);
				$oMENU->icon = $file_name;
			}
						
			$oMENU->title_fr = $title_fr;
			$oMENU->content_fr = $content_fr;
			$oMENU->url = $oTOOLS->urlize($title_fr) . ".html";
			$oMENU->color = "";
			$oMENU->background = "";
			$oMENU->visible = $visible;
			
			
			if($oMENU->update()){
				$message = NOTIFICATION::success("Opération réussie.");
			}else{
				$message = NOTIFICATION::error("Une erreur s'est produit lors de l'enregistrement des données.");
			}
		}
	}
?>
<h1>Modification d'une page</h1>
<div class="notification-block">
	<?php echo $message ?>
</div>
<hr />
<form role="form" method="post" action="?action=edit&id=<?php echo $oMENU->id; ?>" enctype='multipart/form-data'>
	<div class="form-group">
		<label>Titre</label>
		<input type="text" class="form-control" name="title_fr" value="<?php echo $oMENU->title_fr ?>">
		<span class="help-block"><em><?php echo BASE_URL . $oMENU->url; ?></em></span>
	</div>
	<!--<div class="form-group">
		<label>Icône du menu</label>
		<input type="file" name="icon" class="btn-default" title="<span class='glyphicon glyphicon-upload'></span>">
		<p class="help-block">
			<em>Actuellement :</em>
			<img  width="128" height="128" src="<?php echo BASE_URL . "img/menu/icon/" . $oMENU->icon; ?>" alt="Aucun visuel" class="img-thumbnail">
		</p>
	</div>-->
	<div class="form-group">
		<label>Contenu</label>
		<textarea class="form-control" name="content_fr"><?php echo $oMENU->content_fr ?></textarea>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="visible" <?php if($oMENU->visible == 1){ echo "checked='checked'"; } ?>> Visible
		</label>
	</div>
	<input type="submit" class="btn btn-default" value="Modifier" />
	<a href="index.php?menu_parent=<?php echo $oMENU->menu_parent ?>" class="btn btn-primary">Retour</a>
</form>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	
	ob_start();
?>
<script>
	$(document).ready(function(){
		tinymce.init({
			language : 'fr_FR',
			height: 610,
			selector: "textarea",
			relative_urls : false,
			remove_script_host : false,
			resize: false,
			document_base_url: "http://www.bmgcreation.fr/guyon/",
			plugins : "anchor, pagebreak,table,image,textcolor,link,media,searchreplace,contextmenu,paste,directionality,noneditable,visualchars,template,wordcount,layer",
			file_browser_callback : elFinderBrowser,
			menubar: "tools",
			image_advtab: true,
			toolbar: "undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontselect fontsizeselect forecolor | bullist numlist outdent indent | table | image media link unlink | template | anchor",
		});
						
	});
	
	function elFinderBrowser (field_name, url, type, win) {
		tinymce.activeEditor.windowManager.open({
			file: '<?php echo BASE_URL ; ?>/elfinder/elfinder.html',// use an absolute path!
			title: 'elFinder 2.0',
			width: 900,  
			height: 450,
			resizable: 'yes'
		}, {
			setUrl: function (url) {
				win.document.getElementById(field_name).value = url;
			}
		});
		return false;
	}
</script>
<?php
	$js = ob_get_contents();
	ob_end_clean();
	include LAYOUT;
?>