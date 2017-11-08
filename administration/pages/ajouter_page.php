<?php
	ob_start();

	require_once "../config.inc.php";
	
	$oTOOLS = TOOLS::getInstance();
	$oMENU = new MENU;	
	$message = null;
	
	if(isset($_GET["action"])){
		if($_GET["action"] == "add"){	
			
			$title_fr = $_POST["title_fr"];
			$content_fr = $_POST["content_fr"];
			$menu_parent = $_POST["menu_parent"];
			$visible = isset($_POST["visible"]) ? 1 : 0;
			
			/* if($_FILES['icon']['size'] > 0){	
				$tmp_name  = $_FILES['icon']['tmp_name'];
				$file_name = "icon-menu-chateau-roche-guyon-" . $oTOOLS->random_str(4) . "." . pathinfo($_FILES['icon']['name'], PATHINFO_EXTENSION);
				$path = ROOT . "img" . DS . "menu" . DS . "icon" . DS;
				$target = $path . $file_name;
				@unlink($path . $oMENU->icon);
				move_uploaded_file($tmp_name, $target);
				$oMENU->icon = $file_name;
			}*/
						
			$oMENU->title_fr = $title_fr;
			$oMENU->content_fr = $content_fr;
			$oMENU->menu_parent = $menu_parent;
			$oMENU->url = $oTOOLS->urlize($title_fr) . ".html";
			$oMENU->color = "";
			$oMENU->background = "";
			$oMENU->visible = $visible;
			
			
			if($oMENU->add()){
				$message = NOTIFICATION::success("Opération réussie.");
			}else{
				$message = NOTIFICATION::error("Une erreur s'est produit lors de l'enregistrement des données.");
			}
		}
	}
	
	$menus = $oMENU->find("menu_parent is null order by ordre")->Objets();
?>
<h1>Ajout d'une page</h1>
<div class="notification-block">
	<?php echo $message ?>
</div>
<hr />
<form role="form" method="post" action="?action=add" enctype='multipart/form-data'>
	<div class="form-group">
		<label>Rubrique</label>
		<select name="menu_parent">
			<?php foreach($menus as $i => $menu){ ?>
				<option value="<?php echo $menu->id; ?>"><?php echo $menu->title_fr; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Titre</label>
		<input type="text" class="form-control" name="title_fr">
		<span class="help-block"><em></em></span>
	</div>
	<!--<div class="form-group">
		<label>Icône du menu</label>
		<input type="file" name="icon" class="btn-default" title="<span class='glyphicon glyphicon-upload'></span>">
	</div>-->
	<div class="form-group">
		<label>Contenu</label>
		<textarea class="form-control" name="content_fr"></textarea>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="visible"> Visible
		</label>
	</div>
	<input type="submit" class="btn btn-default" value="Ajouter" />
	<a href="../menus/index.php" class="btn btn-primary">Retour</a>
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
			height: 556,
			width: 669,
			selector: "textarea",
			relative_urls: true,
			remove_script_host : false,
			resize: false,
			document_base_url: "http://www.bmgcreation.fr/guyon/",
			plugins : "anchor, pagebreak,table,image,textcolor,link,media,searchreplace,contextmenu,paste,directionality,noneditable,visualchars,template,wordcount,layer",
			file_browser_callback : elFinderBrowser,
			menubar: "tools",
			image_advtab: true,
			toolbar: "undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fontselect fontsizeselect forecolor | bullist numlist outdent indent | table | image media link unlink | template | anchor",
			font_formats: "Andale Mono=andale mono,times;"+
							"Arial=arial,helvetica,sans-serif;"+
							"Arial Black=arial black,avant garde;"+
							"Book Antiqua=book antiqua,palatino;"+
							"Calibri=calibri;"+
							"Comic Sans MS=comic sans ms,sans-serif;"+
							"Courier New=courier new,courier;"+
							"Georgia=georgia,palatino;"+
							"Helvetica=helvetica;"+
							"Impact=impact,chicago;"+
							"Symbol=symbol;"+
							"Tahoma=tahoma,arial,helvetica,sans-serif;"+
							"Terminal=terminal,monaco;"+
							"Times New Roman=times new roman,times;"+
							"Trebuchet MS=trebuchet ms,geneva;"+
							"Verdana=verdana,geneva;"+
							"Webdings=webdings;"+
							"Wingdings=wingdings,zapf dingbats"
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