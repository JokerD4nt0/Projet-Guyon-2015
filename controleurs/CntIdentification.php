<?php
	require_once '/../vues/public/VueIdentification.php';
	
	function connexion(){
	
		$serveur = "localhost";
		$log_connect = "root";
		$pass_connect = "";
		$database = "guyonV2";
		
		$connexion = mysqli_connect($serveur, $log_connect, $pass_connect, $database);
		mysqli_query($connexion,"SET NAME UTF8");
		return($connexion);
	}
	$connexion = connexion();
	
	if(!empty($_POST)){
	
		$login = $_POST["login"];
		$password = $_POST["password"];
		
		$sql = "SELECT * FROM administrateur
		WHERE login = '".$login."'
		AND password = '".$password."'
		;";
		$request = mysqli_query($connexion,$sql);
		
		if(mysqli_num_rows($request) == 0){
		
			$erreur="<b><font color=red>Erreur d'authentification ! Veuillez entrer un identifiant et un mot de passe valide !</font></br>";
		}else{
		
			Session_start();
			$_SESSION["login"]= $login;
			header("Location:index.php?page=Administration&id_langue=1");
		}
	}
	
	if(isset($erreur)){
	
		echo("<span id=\"erreur\">".$erreur."</span><br/>");
	}
?>