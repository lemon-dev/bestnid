<?php

error_reporting(-1);
ini_set('display_errors', 'On');

$errors 	= array();
$data		= array();

include('../db/connect.php');

if(isset($_POST)){
	if(isset($_POST['subastaTitulo'], $_POST['subastaImagenUrl'], $_POST['subastaDesc'], $_POST['subastaFechaFin'])) {
		
		require_once('../db/sanitize_input.php');

		$nombre = sanitize($_POST['subastaTitulo']);
		$apellido = sanitize($_POST['subastaImagenUrl']);
		$nombre_usuario = sanitize($_POST['subastaDesc']);



		

			$query = "INSERT INTO producto (id_usuario, dni, email, nombre_usuario, password, nombre, apellido, tarjeta, fecha_alta)
						VALUES (NULL, '" . $_POST['dni'] ."', '" . $_POST['email'] . "' ,'" . $_POST['nombre_usuario'] . "', '" . $_POST['password'] . "', '" . $_POST['nombre'] . "', '" . $_POST['apellido'] ."', '" . $_POST['tarjeta'] . "', CURRENT_DATE())";
			
			
		

		if(!empty($errors)) {
			
			$data['success'] = false;
		    $data['errors']  = $errors;

		} else {

			$data['success'] = true;
		    $data['message'] = 'Se ha registrado con exito!';

		}

		echo json_encode($data);
	}
}
?>