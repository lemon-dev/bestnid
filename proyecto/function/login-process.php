<?php

error_reporting(-1);
ini_set('display_errors', 'On');

$data = array();
$errors = array();

if(isset($_POST)){

	if(isset($_POST['nombre'], $_POST['pass'])) {

		include("../db/connect.php");

		$result = $db->query("SELECT * FROM usuario WHERE nombre_usuario = '" . $_POST['nombre'] . "'");

		if ($result->num_rows == 0) {
		
			$data['status'] = 'fail';
		
		} else {
			
			$row = $result->fetch_object();

			if($_POST['pass'] == $row->password) {
				$data['status'] = 'success';
				session_start();
				$_SESSION['nombre_usuario'] = $_POST['nombre'];
				$data['session'] = $_SESSION;
			} else {
				
				$data['status'] = 'fail';
				$data['message'] = 'La contraseña no es correcta';
				$data['password'] = $_POST['pass'];

			}
		}

	} else {
		$data['status'] = 'fail';
		$data['message'] = 'Campos vacios';
	}

	echo json_encode($data);
}

?>