<?php
	session_start();
	error_reporting(-1);
	ini_set('display_errors', 'On');

	$errors = array();
	
	include('../db/connect.php');

	if(isset($_POST)){
		if(isset($_POST['idUsuario'])){

			//seleccionamos todas las subastas que pertenecen al usuario 
			$query="SELECT * FROM subasta WHERE id_usuario ='".$_POST['idUsuario']."'";

			$result = $db->query($query);
			
			while($row=$result->fetch_object()){
				//verificamos que no tenga subasta activas
				if($row->fecha_final>date('Y-m-d')){
					$errors = 'El usuario tiene subastas activas';
					header('Location: /verPerfil.php?status=fail');
					die();
				}
			}

			$resultado = $db->query($query);
			
			while($row=$resultado->fetch_object()){
				//borramos todas las ofertas que pertenecen a las subastas del usuario
				$query="DELETE FROM oferta WHERE id_subasta ='".$row->id_subasta."'";
				$result = $db->query($query);

				//borramos los productos que pertenecen a las subastas del usuario 
				$query ="DELETE FROM producto WHERE id_producto ='".$row->id_producto."'";
				$result = $db->query($query);
			}

			//borramos todas las ofertas que pertenecen al usuario
			$query="DELETE FROM oferta WHERE id_usuario ='".$_POST['idUsuario']."'";

			$result = $db->query($query);

			//borramos las subastas del usuario
			$query =" DELETE FROM subasta WHERE id_usuario ='".$_POST['idUsuario']."'"; 

			$result = $db->query($query);

			//borramos al usuario
			$query ="DELETE FROM usuario WHERE id_usuario ='".$_POST['idUsuario']."'";
			
			if($result = $db->query($query)){
				//cerramos la sesion
				session_unset();
				session_destroy();
				header('Location: /verPerfil.php?status=success');
				die();
			}					
			
		}
	}

?>