<?php
	$titre='<h2>Ajout d\'un article</h2>';
	
	$contenu='
		<div class="notification-block">
			<?php echo $message; ?>
		</div>
		<hr />
		<form method="POST">
		<fieldset>
			<div class="form-group">
				<label>Icône de l\'article</label>
				<input type="file" name="icon_article" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label>URL</label>
				<input type="text" class="form-control" name="url_article"/>
			</div>
			<div class="form-group">
				<label>Titre</label>
				<input type="text" class="form-control" name="titre_article"/>
			</div>
			<div class="form-group">
				<label>Sous-titre</label>
				<input type="text" class="form-control" name="soustitre_article"/>
			</div>
			<div class="form-group">
				<label>Contenu de l\'article</label>
				<textarea class="form-control" name="contenu_article">
				</textarea>
			</div>
			<div class="form-group">
				<label>Type d\'évènement</label>
				<input type="text" class="form-control" name="type_evenement"/>
			</div>
			<div class="form-group">
				<label>Date de début de l\'évènement</label>
				<input type="text" class="form-control" name="date_debut"/>
				<p class="help-block">
					<em>Date au format YYYY-MM-DD</em>
				</p>
			</div>
			<div class="form-group">
				<label>Date de fin de l\'évènement</label>
				<input type="text" class="form-control" name="date_fin"/>
				<p class="help-block">
					<em>Date au format YYYY-MM-DD</em>
				</p>
			</div>
			<div class="form-group">
				<label>Image annexe 1</label>
				<input type="file" name="image" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label>Image annexe 2</label>
				<input type="file" name="image2" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label>Image annexe 3</label>
				<input type="file" name="image3" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label>Image annexe 4</label>
				<input type="file" name="image4" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label>Image annexe 5</label>
				<input type="file" name="image5" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label>Image annexe 6</label>
				<input type="file" name="image6" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label>Libellé de la pièce jointe</label>
				<input type="text" class="form-control" name="libelle_pj"/>
			</div>
			<div class="form-group">
				<label>Icône de la pièce jointe 1</label>
				<input type="file" name="icon_pj" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label>Fichier de pièce jointe 1</label>
				<input type="file" name="lien_pj" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label>Icône de la pièce jointe 2</label>
				<input type="file" name="icon_pj2" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label>Fichier de pièce jointe 2</label>
				<input type="file" name="lien_pj2" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label>Icône de la pièce jointe 3</label>
				<input type="file" name="icon_pj3" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label>Fichier de pièce jointe 3</label>
				<input type="file" name="lien_pj3" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
			</div>
			<div class="form-group">
				<label> Statut </label>
				<select name="visible">
					<option value="1">Visible</option>
					<option value="0">Masquée</option>
				</select>
			</div>
			<input type="submit" class="btn btn-default" value="Ajouter" />
			<a href="index.php?page=GestionArticle&id_langue='.$_GET['id_langue'].'" class="btn btn-primary">Retour</a>
		</fieldset>
		</form>
		<br/>
	';
	
	if(isset($_POST['titre_article'])){
	
		$titre.='<br/><strong>L\'article a été correctement enregistré !</strong>';
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