<?php
	$titre='<h2>Ajout d\'une page</h2>';
	
	$contenu='
		<div class="notification-block">
			<?php echo $message; ?>
		</div>
		<hr />
		<form method="POST">
			<fieldset>
				<div class="form-group">
					<label>URL de la page</label>
					<input type="text" class="form-control" name="url_page"/>
				</div>
				<div class="form-group">
					<label>Titre de la page</label>
					<input type="text" class="form-control" name="titre_page"/>
				</div>
				<div class="form-group">
					<label>Sous-titre de la page</label>
					<input type="text" class="form-control" name="soustitre_page"/>
				</div>
				<div class="form-group">
					<label>Contenu de la page</label>
					<textarea clas="form-control" name="contenu_page">
					</textarea>
				</div>
				<div class="form-group">
					<label for="id_menu">Menu parent</label>
					<select name="id_menu">
				';
				
				foreach($reponse_menu as $donnees_menu){
				
					$contenu.='
						<option value="'.$donnees_menu[0].'">'.$donnees_menu[2].'</option>
					';
				}
				
				$contenu.='
					</select>
				</div>
				<div class="form-group">
					<label>Position de la page dans le menu</label>
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
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18>18</option>
						<option value="19">19</option>
						<option value="20">20</option>
					</select>
				</div>
				<div class="form-group">
					<label> Statut </label>
					<select name="visible">
						<option value="1">Visible</option>
						<option value="0">Masquée</option>
					</select>	
				</div>
				<input type="submit" class="btn btn-default" value="Ajouter" />
				<a href="index.php?page=GestionMenu&id_langue='.$_GET['id_langue'].'" class="btn btn-primary">Retour</a>
			</fieldset>
		</form>
		<br/>
	';
	
	if(isset($_POST['id_menu'])){
	
		$titre.='<br/><strong>La page a été enregistré !</strong>';
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