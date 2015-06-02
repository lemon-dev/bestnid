<?php

function user_exists($name,$pass) {
	include('connect.php');
	
	$result = $db->query("SELECT * FROM Usuario WHERE nombre_usuario = '" . $name . "'");
	if ($result->num_rows == 0) {
		return 0;
	}else{
		$user = $result->fetch_object();
		return $user->password == $pass;
	}

}

?>