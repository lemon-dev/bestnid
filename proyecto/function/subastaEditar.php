<?php
	session_start();
	error_reporting(-1);
	ini_set('display_errors', 'On');

	include('../db/connect.php');

	if(isset($_POST)){
		if(isset($_POST['subastaTitulo'], $_POST['subastaCategorias'], $_POST['subastaImagenUrl'], $_POST['subastaDesc'], 
			$_POST['idSubasta'], $_POST['idProducto'])) {
			
			require_once('../db/sanitize_input.php');

			$titulo = sanitize($_POST['subastaTitulo']);
			$descripcion = sanitize($_POST['subastaDesc']);
			

			$query = " UPDATE producto SET nombre = '".$titulo."', imagen_url = '".$_POST['subastaImagenUrl']."' , 
			id_categoria = '".$_POST['subastaCategorias']."' WHERE id_producto = '".$_POST['idProducto']."' "; 
			
			$result = $db->query($query);

			$query = " UPDATE subasta SET titulo = '".$titulo."' , descripcion = '".$_POST['subastaDesc']."' 
					 WHERE id_subasta = '".$_POST['idSubasta']."' ";
			
			if($result = $db->query($query)){
				header('Location: /verPerfil.php');
			}					
			
		}
	}

?>