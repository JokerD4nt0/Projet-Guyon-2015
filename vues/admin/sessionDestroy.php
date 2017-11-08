<?php 
	// You have to open the session first 
	session_start(); 

	//Remove all the variables in the session 
	session_unset(); 

	session_destroy();
	
	header("Location:../../index.php");
?>