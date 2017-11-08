<?php
	$titre='<h2>Ajout d\'une actualité</h2>';
	
	$contenu='
		<div class="notification-block">
			<?php echo $message; ?>
		</div>
		<hr />
		<form method="POST">
			<div class="form-group">
				<label>Position de l\'actualité</label>
				<select name="ordre">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
			<div class="form-group">
				<label> Statut </label>
				<select name="visible">
					<option value="1">Visible</option>
					<option value="0">Masquée</option>
				</select>
			</div>
			<div class="form-group">
				<label>Contenu de l\'actualité</label>
				<input type="text" class="form-control" name="contenu_news"/>
			</div>
			<input type="submit" class="btn btn-default" value="Ajouter" />
			<a href="index.php?page=GestionNews&id_langue='.$_GET['id_langue'].'" class="btn btn-primary">Retour</a>
		</form>
		<br/>
	';
	
	if(isset($_POST['contenu_news']) || isset($_POST['ordre']) || isset($_POST['visible'])){
	
		$titre.='<br/><strong>L\'actualité a été correctement enregistrée !</strong>';
	}
	
	$js='
		<script>
			$(document).ready(function(){
				tinymce.init({
					language : \'fr_FR\',
					height: 556,
					width: 669,
					selector: "textarea",
					relative_urls: true,
					remove_script_host : false,
					resize: false,
					document_base_url: "http://www.bmgcreation.fr/guyon-v2/",
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
					file: \'../../elfinder/elfinder.html\',// use an absolute path!
					title: \'elFinder 2.0\',
					width: 900,  
					height: 450,
					resizable: \'yes\'
				}, {
					setUrl: function (url) {
						win.document.getElementById(field_name).value = url;
					}
				});
				return false;
			}
		</script>
	';
	
	require_once 'squeletteAdmin.php';
?>