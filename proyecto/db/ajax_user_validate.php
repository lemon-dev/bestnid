<?php

error_reporting(-1);
ini_set('display_errors', 'On');

function user_validate($name, $password) {
		include('connect.php');

		$result = $db->query("SELECT * FROM usuario WHERE nombre_usuario = '" . $name . "'");

		if ($result->num_rows == 0) {
			$error = array('status' => 'success', 'username' => $name);
			echo json_encode($error);
		}else{
			
			$user = $result->fetch_object();
			
			if($user->password == $password){
				$error = array('status' => 'fail', 'user' => $name);
				echo json_encode($error);
			}
		}
		return true;
	}

if(isset($_POST['action'])) {

	$name = trim($_POST['nombre']);
	$pass = trim($_POST['pass']);

	user_validate($name, $pass);

}

?>