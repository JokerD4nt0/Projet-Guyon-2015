<?php
	$ssid = session_id();
	if(empty($ssid)){
		session_start();
	}
	
	if(!isset($_SESSION["admin_sess_id"])){
		//header("location: index.php");
	}
	
	define('DS', DIRECTORY_SEPARATOR);
	
	$root = $_SERVER["DOCUMENT_ROOT"] . DS . 'guyon' . DS;

	define('ROOT', $root);	
	define('LAYOUT', $root . DS . "administration" . DS . "master-page.inc.php");
	define("BASE_URL", "localhost/");	

	function class_autoload($class_name){
		require_once ROOT . 'class' . DS . strtolower($class_name) . '.class.php';
	}

	spl_autoload_register("class_autoload", true);
?>