<?php
	Session_start();
	
	if(!isset($_SESSION["login"]))
	{
		header("Location:index.php?erreur=ok");
	}
?>