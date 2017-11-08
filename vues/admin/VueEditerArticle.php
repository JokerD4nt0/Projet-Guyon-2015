<?php
	$titre='<h2>Modification d\'un article</h2>';
	
	$contenu='
		<div class="notification-block">
		<?php echo $message; ?>
	</div>
	<hr />
	<form method="POST">
		<div class="form-group">
		<label>Icône de l\'article</label>
		<input type="file" name="icon_article" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>"/>
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/icon/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[2].'';
	}
	
	$contenu.='
	" alt="Aucun visuel" class="img-thumbnail">
		</p>
	</div>
	<div class="form-group">
		<label>URL</label>
		<input type="text" class="form-control" name="url_article" value="
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[1].'';
	}
	
	$contenu.='"/>
	</div>
	<div class="form-group">
		<label>Titre</label>
		<input type="text" class="form-control" name="titre_article" value="';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[3].'';
	}
	
	$contenu.='"/>
	</div>
	<div class="form-group">
		<label>Sous-titre</label>
		<input type="text" class="form-control" name="soustitre_article" value="
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[4].'';
	}
	
	$contenu.='
	"/>
	</div>
	<div class="form-group">
		<label>Contenu de l\'article</label>
		<textarea class="form-control" name="contenu_article">
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[6].'';
	}
	
		$contenu.='
		</textarea>
	</div>
	<div class="form-group">
		<label>Type d\'évènement</label>
		<input type="text" class="form-control" name="type_evenement" value="
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[5].'';
	}
	
	$contenu.='
		"/>
	</div>
	<div class="form-group">
		<label>Date de début de l\'évènement</label>
		<input type="text" class="form-control" name="date_debut" value="
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[7].'';
	}
	
	$contenu.='"/>
		<p class="help-block">
			<em>Date au format YYYY-MM-DD</em>
		</p>
	</div>
	<div class="form-group">
	<label>Date de fin de l\'évènement</label>
		<input type="text" class="form-control" name="date_fin" value="
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[8].'';
	}
	
	$contenu.='"/>
		<p class="help-block">
			<em>Date au format YYYY-MM-DD</em>
		</p>
	</div>
	<div class="form-group">
		<label>Image annexe 1</label>
		<input type="file" name="image" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>"/>
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/img/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[15].'';
	}
	
	$contenu.='" alt="Aucun visuel" class="img-thumbnail">
		</p>
	</div>
	<div class="form-group">
		<label>Image annexe 2</label>
		<input type="file" name="image2" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>"/>
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/img/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[16].'';
	}
	
	$contenu.='" alt="Aucun visuel" class="img-thumbnail">
		</p>
	</div>
	<div class="form-group">
		<label>Image annexe 3</label>
		<input type="file" name="image3" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>"/>
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/img/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[17].'';
	}
	
	$contenu.='" alt="Aucun visuel" class="img-thumbnail">
		</p>
	</div>
	<div class="form-group">
		<label>Image annexe 4</label>
		<input type="file" name="image4" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>"/>
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/img/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[18].'';
	}
	
	$contenu.='" alt="Aucun visuel" class="img-thumbnail">
		</p>
	</div>
	<div class="form-group">
		<label>Image annexe 5</label>
		<input type="file" name="image5" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>"/>
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/icon/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[19].'';
	}
	
	$contenu.='" alt="Aucun visuel" class="img-thumbnail">
		</p>
	</div>
	<div class="form-group">
		<label>Image annexe 6</label>
		<input type="file" name="image6" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>"/>
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/icon/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[20].'';
	}
	
	$contenu.='
	" alt="Aucun visuel" class="img-thumbnail">
		</p>
	</div>
	
		<div class="form-group">
			<label>Libellé des pièces jointes</label>
			<input type="text" class="form-control" name="libelle_pj" value="
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[10].'';
	}
	
	$contenu.='"/>
	</div>
	<div class="form-group">
		<label>Icône de la pièce jointe 1</label>
		<input type="file" name="icon_pj" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/pj/icon/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[9].'';
	}
	
	$contenu.='" alt="Aucun visuel" class="img-thumbnail" />
		</p>
	</div>
	<div class="form-group">
		<label>Fichier de la pièce jointe 1</label>
		<input type="file" name="lien_pj" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/pj/file/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[11].'';
	}
	
	$contenu.='" alt="Aucun visuel" class="img-thumbnail" />
		</p>
	</div>
	<div class="form-group">
		<label>Icône de la pièce jointe 2</label>
		<input type="file" name="icon_pj2" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/pj/icon/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[21].'';
	}
	
	$contenu.='" alt="Aucun visuel" class="img-thumbnail" />
			</p>
	</div>
	<div class="form-group">
		<label>Fichier de la pièce jointe 2</label>
		<input type="file" name="lien_pj2" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/pj/file/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[13].'';
	}
	
	$contenu.='" alt="Aucun visuel" class="img-thumbnail" />
		</p>
	</div>
	<div class="form-group">
		<label>Icône de la pièce jointe 3</label>
		<input type="file" name="icon_pj3" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/pj/icon/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[22].'';
	}
	
	$contenu.='" alt="Aucun visuel" class="img-thumbnail" />
		</p>
	</div>
	<div class="form-group">
		<label>Fichier de la pièce jointe 3</label>
		<input type="file" name="lien_pj3" class="btn-default" title="<span class=\'glyphicon glyphicon-upload\'></span>">
		<p class="help-block">
			<em>Actuellement :</em>
			<img width="128" height="128" src="../../img/article/pj/file/
	';
	
	foreach($reponse_article as $donnees_article){
	
		$contenu.=''.$donnees_article[14].'';
	}
	
	$contenu.='" alt="Aucun visuel" class="img-thumbnail" />
			</p>
		</div>
	<div class="form-group">
		<label> Statut :</label>
		<p class="help-block">
			<em>Actuellement :</em>
	';
	
	foreach($reponse_article as $donnees_article){
	
		if($donnees_article[12] == 1){
		
			$contenu.='<span class="label label-success">Visible</span>';
		}else{
		
			$contenu.='<span class="label label-warning">Masquée</span>';
		}
	}
	
	$contenu.='</p><select name="visible">
	<option value="';
	
	foreach($reponse_article as $donnees_article){
		
		$contenu.=''.$donnees_article[12].'">';
		
		if($donnees_article[12] == 1){
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
		<a href="index.php?page=GestionArticle&id_langue='.$_GET['id_langue'].'" class="btn btn-primary">Retour</a>
	</form>
	<br/>
	';
	
	if(isset($_POST['url_article']) || isset($_POST['titre_article']) || isset($_POST['soustitre_article']) || isset($_POST['type_evenement']) || isset($_POST['icon_article']) || isset($_POST['contenu_article']) || isset($_POST['libelle_jp']) || isset($_POST['lien_pj']) || isset($_POST['icon_pj']) || isset($_POST['date_debut']) || isset($_POST['date_fin']) || isset($_POST['visible']) || isset($_POST['lien_pj2']) || isset($_POST['lien_pj3']) || isset($_POST['image']) || isset($_POST['image2']) || isset($_POST['image3']) || isset($_POST['image4']) || isset($_POST['image5']) || isset($_POST['image6'])){
		
		$titre.='<br/><strong>L\'article a été correctement modifié!</strong>';
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