<?php

error_reporting(-1);
ini_set('display_errors', 'On');


function user_validate($name) {
		include('connect.php');

		$result = $db->query("SELECT * FROM usuario WHERE nombre_usuario = '" . $name . "'");

		if ($result->num_rows == 0) {
			$error = array('status' => 'success', 'username' => $name);
			echo json_encode($error);
		}else{
			$error = array('status' => 'fail', 'user' => $name);
			echo json_encode($error);
		}
		return true;
	}

if(isset($_POST['action'])) {

	$name = trim($_POST['nombre']);
	validate($name);

}

?>