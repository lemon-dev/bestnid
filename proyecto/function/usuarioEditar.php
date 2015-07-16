<?php

	error_reporting(-1);
	ini_set('display_errors', 'On');

	$errors 	= array();
	$data		= array();

	include('../db/connect.php');

	if(isset($_POST)){
		if(isset($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['email'], $_POST['password'], $_POST['tarjeta'], $_POST['idUsuario'])) {
		
			require_once('../db/sanitize_input.php');

			$nombre = sanitize($_POST['nombre']);
			$apellido = sanitize($_POST['apellido']);
			$dni = sanitize($_POST['dni']);
			$email = sanitize($_POST['email']);
			$password = sanitize($_POST['password']);
			$tarjeta = sanitize($_POST['tarjeta']);
			$idUsuario = sanitize($_POST['idUsuario']);

			$query = "UPDATE usuario SET nombre = '".$nombre."', apellido = '".$apellido."' , dni = '".$dni."', email = '".$email."', password = '".$password."', tarjeta = '".$tarjeta."' WHERE id_usuario = '".$idUsuario."' ";
			
			if(!$result = $db->query($query)) {
				$errors['db_error'] = 'Error realizando modificando al usuario, pruebe nuevamente en unos minutos.';
			}

			if(!empty($errors)) {
				
				$data['success'] = false;
			    $data['errors']  = $errors;

			} else {

				$data['success'] = true;
			    $data['message'] = 'Se ha modificado con exito!';
			    session_start();
			    $_SESSION['nombre']=$nombre;
			    $_SESSION['apellido']=$apellido;
			    $_SESSION['dni']=$dni;
			    $_SESSION['email']=$email;
			    $_SESSION['tarjeta']=$tarjeta;
			    $data['session'] = $_SESSION;

			}

			echo json_encode($data);
	}
}
?>