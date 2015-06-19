<?php
	session_start();
	error_reporting(-1);
	ini_set('display_errors', 'On');

	include('../db/connect.php');

	if(isset($_POST)){
		if(isset($_POST['precio'], $_POST['idOferta'])){
			
			require_once('../db/sanitize_input.php');

			
			$precio 	= 	sanitize($_POST['precio']);

			$query =" UPDATE oferta SET precio ='".$_POST['precio']."' WHERE id_oferta = '".$_POST['idOferta']."' "; 
			

			

			if($result = $db->query($query)){
				header('Location: /verPerfil.php');
			}					
			
		}
	}

?>