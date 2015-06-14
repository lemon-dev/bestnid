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
		$necesidad 	= 	sanitize($_POST['necesidad']);
		$id_subasta = 	sanitize($_POST['id_subasta']);

		$query = "	INSERT INTO oferta (id_oferta, id_usuario, id_subasta, necesidad, precio)
					VALUES (NULL, '" . $_SESSION['id_usuario'] . "', '" . $id_subasta . "', '" . $necesidad . "', '" . $precio . "')";

		include('../db/connect.php');

		if($result = $db->query($query)){
			header('Location: /index.php');
		}					
		
	}
}

?>