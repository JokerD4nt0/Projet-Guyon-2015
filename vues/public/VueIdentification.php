<?php
	$titre = "";
	$contenu =
	'
		<form class="form-signin" method="POST" action="index.php?page=Identification">
			<h2 class="form-signin-heading">Veuillez vous authentifier</h2>
			<input type="text" name="login" class="form-control" placeholder="Identifiant"/>
			<input type="password" name="password" class="form-control" placeholder="Mot de passe"/>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
		</form>
		<form class="form-signin" action="../admin/sessionDestroy.php">
			<button class="btn btn-lg btn-primary btn-block">Retour au site</button>
		</form>
	';
	
	require_once 'squeletteIdentification.php';
?>