<?php

error_reporting(-1);
ini_set('display_errors', 'On');

$data = array();
$errors = array();

function user_validate($name, $log_password) {

	include("connect.php");

	$result = $db->query("SELECT * FROM usuario WHERE nombre_usuario = '" . $name . "'");

	if ($result->num_rows == 0) {
		
		$data['status'] = 'fail';
		//$errors['username'] = $name;
		$data['message'] = 'El nombre no existe';

	} else {

		$row = $result->fetch_object();

		if($log_password == $row->password) {
			
			$data['status'] = 'success';

		} else {
			
			$data['status'] = 'fail';
			$data['message'] = 'La contraseña no es correcta';
			$data['password'] = $log_password;

		}

	}

	echo json_encode($data);
	return true;
}

if(isset($_POST['action'])) {

	$name = trim($_POST['nombre']);
	$log_password = trim($_POST['pass']);
	user_validate($name, $log_password);

}

?>