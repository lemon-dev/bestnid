<?php 
	error_reporting(-1);
    ini_set('display_errors', 'On');

	session_start();
	session_unset();
	session_destroy();
	
	header("Location: index.php");
	die();
 ?>