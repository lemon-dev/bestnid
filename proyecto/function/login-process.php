<?php
if(isset($_POST)){

	if(isset($_POST['nombre_usuario'], $_POST['contraseña'])) {
		
		$nombre_usuario = trim($_POST['nombre_usuario']);
		$contraseña = trim($_POST['contraseña']);


		require_once("db/user_exists.php");

		if (user_exists($nombre_usuario,$contraseña)) {
		 
			session_start();

			$_SESSION['nombre_usuario'] = $nombre_usuario;
			header('Location: index.php');
			die();
		}else{
			echo "Usuario o contraseña no valido";
			//header('Location: login.php');
		}
	}
}

?>