<?php
	session_start();
	error_reporting(-1);
	ini_set('display_errors', 'On');

	include('../db/connect.php');

	if(isset($_POST)){
		if(isset($_POST['idSubasta'])){


			//seleccionamos id del producto para borrar el producto de la subasta
			$query="SELECT * FROM subasta WHERE id_subasta ='".$_POST['idSubasta']."'";

			$result = $db->query($query);
			
			while($row=$result->fetch_object()){
				$idProducto=$row->id_producto;
			}

			//borramos todas las ofertas que pertenecen a la subasta
			$query="DELETE FROM oferta WHERE id_subasta ='".$_POST['idSubasta']."'";

			$result = $db->query($query);

			//finalmente borramos la subasta 
			$query =" DELETE FROM subasta WHERE id_subasta ='".$_POST['idSubasta']."'"; 

			$result = $db->query($query);

			//borramos el producto que pertenece a la subasta
			$query ="DELETE FROM producto WHERE id_producto ='".$idProducto."'";
			
			if($result = $db->query($query)){
				header('Location: /verPerfil.php');
			}					
			
		}
	}

?>