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
				';
	
	foreach($reponse_menu_left as $donnees_menu_left)
		
		if($donnees_menu_left[0] == 3){
			
			$contenu.='<div id="left_calendar"></div>';
			
		}else if($donnees_menu_left[3] != "" ){
					
			$contenu.='<div class="border">
			<img src="img/menu/icon/';
		
	
			foreach($reponse_menu_left as $donnees_menu_left){
			
				$contenu.=''.$donnees_menu_left[3].'';
			}
			
			$contenu.='"/></div>';
	}
	
	$contenu.='
		</div>
	</div>
	<div id="block_page">
	';
	
	$contenu.='
		<div class="content">
	';
	
	foreach($reponse_article as $donnees_article)
	
		if($donnees_article[7] == 1){
	
			$contenu.='
				<div id="article">
			';
			
			if($donnees_article[12] == ""){
			
				$contenu.='<h5> </h5>';
			}else{
			
				$contenu.='<h5>'.$donnees_article[12].'</h5>';
			}
			
			$contenu.='<h3>'.$donnees_article[10].'</h3>';
			
			if($donnees_article[5] && $donnees_article[6] == "0000-00-00"){
	
			$contenu.='<h4 class="date"> </h4>';
			
			}else{
	
			$contenu.='
						<h4 class="date">Du '.$donnees_article[5].' au '.$donnees_article[6].'</h4>
			';
			}
			
			$contenu.='
					<h4><i>'.$donnees_article[11].'</i></h4>
					<div class="content_article">
						<p>'.$donnees_article[13].'</p>
					</div>
					<div class="icon_article">
						<a href="index.php?page=Article&id_menu='.$_GET['id_menu'].'&id_page='.$_GET['id_page'].'&id_article='.$donnees_article[0].'&id_langue='.$_GET['id_langue'].'">
							<img src="img/article/icon/'.$donnees_article[3].'"/>
						</a>
					</div>
				</div>
				</a>
			';
			
		}elseif(($donnees_article[7] % 2) == 0){
		
			$contenu.='
			<table id="table_article">
				<tr>
				<td>
				<div id="article_pair">
					<h3>'.$donnees_article[10].'</h3>
					<div class="content_pair">
						'.$donnees_article[13].'
					</div>
					<div class="icon_pair">
						<a href="index.php?page=Article&id_menu='.$_GET['id_menu'].'&id_page='.$_GET['id_page'].'&id_article='.$donnees_article[0].'&id_langue='.$_GET['id_langue'].'">
							<img src="img/article/icon/'.$donnees_article[3].'"/>
						</a>
					</div>
				</td>
			';
		}else{
		
			$contenu.='
				<td>
				<div id="article_impair">
					<div class="icon_impair">
						<a href="index.php?page=Article&id_menu='.$_GET['id_menu'].'&id_page='.$_GET['id_page'].'&id_article='.$donnees_article[0].'&id_langue='.$_GET['id_langue'].'">
							<img src="img/article/icon/'.$donnees_article[3].'"/>
						</a>
					</div>
					<h3>'.$donnees_article[10].'</h3>
					<div class="content_impair">
						'.$donnees_article[13].'
					</div>
				</div>
				</td>
			';
		}
	
	foreach($reponse_page as $donnees_page){
	
		$contenu.='
		'.$donnees_page[5].'
		';
	}
	
	$contenu.='
							</tr>
						</table>
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
