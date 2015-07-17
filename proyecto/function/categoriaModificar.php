<?php 
error_reporting(-1);
ini_set('display_errors', 'On');
include('../db/functions.php');

if(isset($_POST['nombre'], $_POST['id_categoria'])){

	$nombre = $_POST['nombre'];
	$id_categoria = $_POST['id_categoria'];

	modificarCategoria($id_categoria, $nombre);
}

?>