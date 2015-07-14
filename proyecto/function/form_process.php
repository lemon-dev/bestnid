<?php

error_reporting(-1);
ini_set('display_errors', 'On');

$errors 	= array();
$data		= array();

include('../db/connect.php');

if(isset($_POST)){
	if(isset($_POST['nombre'], $_POST['apellido'], $_POST['nombre_usuario'], $_POST['dni'], $_POST['email'], $_POST['password'], $_POST['tarjeta'])) {
		
		require_once('../db/sanitize_input.php');

		$nombre = sanitize($_POST['nombre']);
		$apellido = sanitize($_POST['apellido']);
		$nombre_usuario = sanitize($_POST['nombre_usuario']);
		$dni = sanitize($_POST['dni']);
		$email = sanitize($_POST['email']);
		$password = sanitize($_POST['password']);
		$tarjeta = sanitize($_POST['tarjeta']);


		$result = $db->query("SELECT * FROM usuario WHERE nombre_usuario = '" . $_POST['nombre_usuario'] . "'");

		if($result->num_rows == 0) {

			$query = "INSERT INTO usuario (id_usuario, id_rol, dni, email, nombre_usuario, password, nombre, apellido, tarjeta, fecha_alta)
						VALUES (NULL, 1 , '" . $_POST['dni'] ."', '" . $_POST['email'] . "' ,'" . $_POST['nombre_usuario'] . "', '" . $_POST['password'] . "', '" . $_POST['nombre'] . "', '" . $_POST['apellido'] ."', '" . $_POST['tarjeta'] . "', CURRENT_DATE())";
			
			if(!$result = $db->query($query)) {
				$errors['db_error'] = 'Error realizando el registro, pruebe nuevamente en unos minutos.';
			}

		} else {
			
			$errors['user'] = 'El nombre usuario ya existe';

		}

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