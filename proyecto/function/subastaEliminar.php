<?php
	session_start();
	error_reporting(-1);
	ini_set('display_errors', 'On');

	include('../db/connect.php');

	if(isset($_POST)){
		if(isset($_POST['idSubasta'])){	
			
							
			//seleccionamos id de la oferta exitosa para borrarla (si hay)
			$query="SELECT * FROM oferta_exitosa E INNER JOIN oferta O WHERE O.id_subasta = '".$_POST['idSubasta']."' AND E.id_oferta = O.id_oferta";

			$result = $db->query($query);
			$row=$result->fetch_object();
			$id_oferta_exitosa=$row->id_oferta_exitosa;

			echo $row->id_oferta_exitosa;

			if($result->num_rows > 0){
				$query="DELETE FROM oferta_exitosa WHERE id_oferta_exitosa = '".$id_oferta_exitosa."'";
			}
			
			//borramos todas las ofertas que pertenecen a la subasta
			$query="DELETE FROM oferta WHERE id_subasta ='".$_POST['idSubasta']."'";

			$result = $db->query($query);
			
			//echo "elimino ofertas";

			//seleccionamos id del producto para borrar el producto de la subasta
			$query="SELECT * FROM subasta WHERE id_subasta ='".$_POST['idSubasta']."'";

			$result = $db->query($query);
			
			$row=$result->fetch_object();
			$idProducto=$row->id_producto;

			//borramos el producto que pertenece a la subasta
			$query ="DELETE FROM producto WHERE id_producto ='".$idProducto."'";
			
			$result = $db->query($query);

			//finalmente borramos la subasta 
			$query =" DELETE FROM subasta WHERE id_subasta ='".$_POST['idSubasta']."'"; 

			
			if($result = $db->query($query)){
				header('Location: /verPerfil.php');

			}

		}
	}

?>