<?php 
error_reporting(-1);
ini_set('display_errors', 'On');
include('../db/functions.php');

if(isset($_POST['id_categoria'], $_POST['nombre'])){

	$id_categoria = $_POST['id_categoria'];

	if(categoriaTieneProducto($id_categoria)){
		
		var_dump(categoriaTieneProducto($id_categoria));
		die();

	} else {
		eliminarCategoria($id_categoria);
		header('Location: /categorias.php');
	}
}

?>
	