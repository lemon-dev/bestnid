<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');

$data = array();
$errors = array();

if(isset($_POST)){
	if(isset($_POST['precio'], $_POST['necesidad'], $_POST['id_subasta'])){
		
		require_once('../db/sanitize_input.php');

		$precio 	= 	sanitize($_POST['precio']);
		$necesidad 	= 	ucfirst(sanitize($_POST['necesidad']);
		$id_subasta = 	sanitize($_POST['id_subasta']);

		/*"INSERT INTO usuario (id_usuario, dni, email, nombre_usuario, password, nombre, apellido, tarjeta, fecha_alta)
						VALUES (NULL, '" . $_POST['dni'] ."', '" . $_POST['email'] . "' ,'" . $_POST['nombre_usuario'] . "', '" . $_POST['password'] . "', '" . $_POST['nombre'] . "', '" . $_POST['apellido'] ."', '" . $_POST['tarjeta'] . "', CURRENT_DATE())";
		*/

		$query = "	INSERT INTO oferta (id_oferta, , id_usuario, id_subasta, necesidad, precio)
					VALUES (NULL, '" . $id_subasta . "', '" . $_SESSION['id_usuario'] . "', '" . $necesidad . "', '" . $precio . "')";

		include('../db/connect.php');		

		header('Location: /index.php');
	}
}

?>