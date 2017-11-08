<?php
	$titre='<h2>Modification d\'une page</h2>';
	
	$contenu='
	<div class ="notification-block">
		<?php echo $message; ?>
	</div>
	<hr/>
	<form method="POST">
		<div class="form-group">
			<label>Titre de la page</label>
			<input type="text" class="form-control" name="titre_page" value="
	';
	
	foreach($reponse_page as $donnees_page){
	
		$contenu.='
			'.$donnees_page[3].'
		';
	}
	
	$contenu.='
			"/>
		</div>
		<div class="form-group">
			<label>Sous-titre de la page</label>
			<input type="text" class="form-control" name="soustitre_page" value="
	';
	
	foreach($reponse_page as $donnees_page){
	
		$contenu.=''.$donnees_page[4].'';
	}
	
	$contenu.='"/>
		</div>
		<div class="form-group">
			<label>Contenu de la page</label>
			<textarea class="form-control" name="contenu_page">
	';
	
	foreach($reponse_page as $donnees_page){
	
		$contenu.='
			'.$donnees_page[5].'
		';
	}
	
	$contenu.='
		</textarea>
	</div>
	<div class="form-group">
		<label for="id_menu">Menu parent</label>
		<p class="help-block">
			<em>Actuellement :</em>
		</p>
		<select name="id_menu">
	';
	
	foreach($reponse_page as $donnees_page){
	
		$contenu.='
			<option value="'.$donnees_page[8].'">'.$donnees_page[11].'</option>
		';
	}
	
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
		<p class="help-block">
			<em>Actuellement :</em>
		</p>
		<select name="ordre">
	';
	
	foreach($reponse_page as $donnees_page){
	
		$contenu.='
			<option value="'.$donnees_page[9].'">'.$donnees_page[9].'</option>
		';
		$contenu.='
			<option value="1">'.$donnees_page[9].'</option>
		';
		$contenu.='
			<option value="2">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="3">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="4">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="5">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="6">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="7">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="8">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="9">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="10">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="11">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="12">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="13">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="14">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="15">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="16">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="17">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="18">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="19">'.$donnees_page[9]+=1 .'</option>
		';
		$contenu.='
			<option value="20">'.$donnees_page[9]+=1 .'</option>
		';
	}
	
	$contenu.='
		</select>
	</div>
	<div class="form-group">
		<label> Statut :</label>
		<p class="help-block">
			<em>Actuellement :</em>
	';
	
	if($donnees_page[10] == 1){
		$contenu.='<span class="label label-success">Visible</span>';
	}else{
		$contenu.='<span class="label label-warning">Masquée</span>';
	}
	
	$contenu.='</p><select name="visible">
	<option value="';
	
	foreach($reponse_page as $donnees_page){
		
		$contenu.=''.$donnees_page[10].'">';
		
		if($donnees_page[10] == 1){
			$contenu.='Visible</option>
			<option value="0">Masquée';
		}else{
			$contenu.='Masquée</option>
			<option value="1">Visible';
		}
	}
	
	$contenu.='</option>
	</select></div>
		<input type="submit" class="btn btn-default" value="Modifier" />
		<a href="index.php?page=GestionPage&id_langue='.$donnees_page[1].'&id_menu='.$donnees_page[8].'" class="btn btn-primary">Retour</a>
	</form>
	<br/>
	';
	
	if(isset($_POST['titre_page']) || isset($_POST['soustitre_page']) || isset($_POST['contenu_page']) || isset($_POST['ordre']) || isset($_POST['id_menu']) || isset($_POST['visible'])){
		
		$titre.='<br/><strong>La page a été correctement modifiée!</strong>';
	}
	
	$js='
		<script>
			$(document).ready(function(){
				tinymce.init({
					language : \'fr_FR\',
					height: 556,
					width: 669,
					selector: "textarea",
					relative_urls : false,
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