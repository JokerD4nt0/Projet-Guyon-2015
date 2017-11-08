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
	
	$contenu =
	'
		<div id=\'slider\'>
			<div class=\'cycle-slideshow\' data-cycle-fx=\'scrollHorz\' data-cycle-timeout=\'10000\' data-cycle-speed=\'1000\' data-cycle-loader=\'wait\'>
	';
	
	foreach($reponse_slider as $donnees_slider){
		$contenu.=
		'
				<img src=\'img/slider/'.$donnees_slider[0].'\'/>
		';
	}
	
	$contenu.=
	'
				<div class=\'cycle-pager\'></div>
			</div>
		</div>
		<br/>
		<br/>
		<div id=\'page_footer\'>
			<div id=\'scroller\'>
				<div class=\'marquee\'>
	';
	
	foreach($reponse_news as $donnees_news){
	
		$contenu.='<span>'.$donnees_news[2].'</span>';
	}
	
	$contenu.='</div>
			</div>
			<div class=\'container\'>
				<div id=\'block\'>
					établissement public de coopération culturelle créé et soutenu par le Conseil Général du Val d\'Oise <a href="vues/public/VueIdentification.php"><input href="vues/public/VueIdentification.php" type="hidden"/> </a> 
				</div>
			</div>
		</div>
	';
	
	$js='';
	
	require_once("squelettePublic.php");
?>