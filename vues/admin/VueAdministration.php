<?php
	$titre = 
	"
		<h4>Bienvenue sur l'interface d'administration du site web du Château de La Roche-Guyon !</h4><hr/>
	";
	
	$contenu='';
	
	$contenu.='
		<form method="GET">
			<input type="hidden" name="page" value="Administration"/>
			<span>Langue :</span>
			<select name="id_langue">
	';
				
	foreach($reponse_langue as $index => $donnees_langue){								
		
		$contenu.='
		<option value="'.$donnees_langue[0].'" 
		';
		
		if($index == ($_GET['id_langue'] - 1)){
		
			$contenu.='
			selected=\"\"
			';
		}
		
		$contenu.='
		>'.$donnees_langue[1].'</option>
		';
	}
	
	$contenu.='
	</select>							
	<input type="submit" class="btn btn-default" value="Valider"/>
	</form>
	';
	
	$js='';
	
	require_once 'squeletteAdmin.php';
?>