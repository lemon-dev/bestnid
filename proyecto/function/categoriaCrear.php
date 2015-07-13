<?php 
error_reporting(-1);
ini_set('display_errors', 'On');
include('../db/functions.php');

if(isset($_POST['nombre'])){

	$nombre = $_POST['nombre'];

	crearCategoria($nombre);
	header('Location: /categorias.php');

}

?>