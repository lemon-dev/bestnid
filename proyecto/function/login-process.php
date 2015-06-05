<?php

error_reporting(-1);
ini_set('display_errors', 'On');

$data = array();
$errors = array();

if(isset($_POST)){

	if(isset($_POST['nombre_usuario'], $_POST['contraseña'])) {

		require_once("../db/sanitize_input.php");
		
		$nombre_usuario = sanitize($_POST['nombre_usuario']);
		$contraseña = sanitize($_POST['contraseña']);


		require_once("db/user_exists.php");

		if (user_exists($nombre_usuario,$contraseña)) {
		 
		 	$data['success'] = true;
			session_start();
			$_SESSION['nombre_usuario'] = $nombre_usuario;
		
		}else{
			$data['success'] = false;
			$errors = 'Usuario o contraseña inválido';
		}

	}
}

$data['errors'] = $errors;

echo json_encode($data);

?>