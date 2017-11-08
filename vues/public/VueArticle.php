<?php
	$menu='';
	
	foreach($reponse_menu as $donnees_menu){
	
		$menu.=
		'
			<div id="'.$donnees_menu[0].'" class="block_categ">
				<input type="hidden" value="#'.$donnees_menu[5].'"/>
				<h4>'.$donnees_menu[2].'</h4>
			</div>
			<img id="fleche" src="img/fleche.png"/>
		';
	}
	
	$contenu='
		<div id="container">
			<div id="content_page">
				<div id="left_menu" style="background-color:#';
	
	foreach($reponse_menu_left as $donnees_menu_left){
	
		$contenu.=''.$donnees_menu_left[5].'';
	}
	
	$contenu.='
	">
	<div id="menu_list">
	';
	
	foreach($reponse_page_left as $donnees_page_left){
	
		$contenu.='
			<a href="index.php?page=Page&id_langue='.$donnees_page_left[1].'&id_page='.$donnees_page_left[0].'&id_menu='.$_GET['id_menu'].'">
				<div class="sous_menu_left">
				'.$donnees_page_left[3].'
						<img class="fleche_left" src="img/fleche_left.png"/>
				</div>
			</a>
		';
	}
	
	$contenu.='
		</div>
			<div id="block_info">
				<div class="border">';
	
	foreach($reponse_menu_left as $donnees_menu_left)
		
		if($donnees_menu_left[0] == 3){
			
			$contenu.='';
			
		}else if($donnees_menu_left[3] != "" ){
					
			$contenu.='<img src="img/menu/icon/';
		
	
			foreach($reponse_menu_left as $donnees_menu_left){
			
				$contenu.=''.$donnees_menu_left[3].'';
			}
			
			$contenu.='"/>';
	}
	
	$contenu.='
			</div>
		</div>
	</div>
	<div id="block_page">
	';
	
	
	$contenu.='
		<div class="content">
	';
	
	foreach($reponse_article as $donnees_article)
	
	$contenu.='
	<br/>
	<div class="detail_article">
		<table>
			<tr>
				<td>
						<h5>'.$donnees_article[5].'</h5>
						<h3>'.$donnees_article[3].'</h3>
	';
	
	if($donnees_article[7] && $donnees_article[8] == "0000-00-00"){
	
		$contenu.='';
	}else{
	
		$contenu.='
						<h4>Du '.$donnees_article[7].' au '.$donnees_article[8].'</h4>
		';
	}
	
	$contenu.='
						<p>
							'.$donnees_article[6].'
						</p>
				</td>
				<td>
					';
	if($donnees_article[15] == ""){
	
		$contenu.='<img src="img/article/icon/'.$donnees_article[2].'';
	}else{
		$contenu.='<img src="img/article/img/'.$donnees_article[15].'';
	}
	
	$contenu.='"/>
					<div class="liste_images">
	';
	
	foreach($reponse_article as $donnee_article){
	
		$contenu.='<img id="image" alt="" src="img/article/img/'.$donnees_article[16].'"/>
		<img id="image" alt="" src="img/article/img/'.$donnees_article[17].'"/>
		<img id="image" alt="" src="img/article/img/'.$donnees_article[18].'"/>
		<img id="image" alt="" src="img/article/img/'.$donnees_article[19].'"/>
		<img id="image" alt="" src="img/article/img/'.$donnees_article[20].'"/>
		';
	}
	
	$contenu.='
					</div>
					<br/>
					<div class="piece_jointe">
						<p>'.$donnees_article[10].'</p>
	';
	
	if($donnees_article[11] != ""){
	
		$contenu.='<a href="img/article/pj/file/'.$donnees_article[11].'"/>
						<img src="img/article/pj/icon/'.$donnees_article[9].'"/>
					</a>
		';
	}elseif($donnees_article[9] != ""){
	
		$contenu.='
			<img src="img/article/pj/icon/'.$donnees_article[9].'"/>
		';
	}else{
	
		$contenu.='';
	}
	
	if($donnees_article[13] != ""){
	
		$contenu.='<a href="img/article/pj/file/'.$donnees_article[13].'"/>
						<img src="img/article/pj/icon/'.$donnees_article[21].'"/>
					</a>
		';
	}elseif($donnees_article[21] != ""){
	
		$contenu.='
			<img src="img/article/pj/icon/'.$donnees_article[21].'"/>
		';
	}else{
	
		$contenu.='';
	}
	
	if($donnees_article[14] != ""){
	
		$contenu.='<a href="img/article/pj/file/'.$donnees_article[14].'"/>
						<img src="img/article/pj/icon/'.$donnees_article[22].'"/>
					</a>
		';
	}elseif($donnees_article[22] != ""){
	
		$contenu.='
			<img src="img/article/pj/icon/'.$donnees_article[22].'"/>
		';
	}else{
	
		$contenu.='';
	}
	
	$contenu.='
					</div>
				</td>
			</tr>
		</table>
	</div>
	';
	
	$contenu.='
					</div>
				</div>
			</div>
			<img id="zoom" src="img/zoom.png" />
		</div>
	';
	
	$js='
	$(function(){
	';
	
	// $js.='$(".block_categ").attr(\'block_categ active\');';
	
	$js.='
		$("#container").css("background-image", "url(\'img/menu/bg/';
		
	foreach($reponse_menu_left as $donnees_menu_left){
		
		$js.=''.$donnees_menu_left[4].'';
	}
	
	$js.='\')");
		$(".block_categ.active").css("background-color", $(".block_categ.active input").val());
					
		$("#zoom").click(function(){
			Lightview.show(\'img/menu/bg/';
		
	foreach($reponse_menu_left as $donnees_menu_left){	
	
		$js.=''.$donnees_menu_left[4].'';
	}
	
	$js.='\');
		});
	});';

	require_once 'squelettePublic.php';
?>
