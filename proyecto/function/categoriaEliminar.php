<?php 
error_reporting(-1);
ini_set('display_errors', 'On');
include('../db/functions.php');

if(isset($_POST['id_categoria'])):

	$id_categoria = $_POST['id_categoria'];
	eliminarCategoria($id_categoria);

endif;

?>
	