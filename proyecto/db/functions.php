<?php 

function subastaConID($id_subasta){
	include('db/connect.php');
	
	$query = "	SELECT 	*
				FROM	subasta S INNER JOIN producto P ON S.id_producto = P.id_producto
								  INNER JOIN categoria C ON P.id_categoria = C.id_categoria
				WHERE	S.id_subasta = " . $id_subasta;

	$result = $db->query($query);

	$row = $result->fetch_object();

	return $row;
}

function ofertasParaSubasta($id_subasta){

	include('db/connect.php');
	$query = "	SELECT *
				FROM oferta O
				INNER JOIN usuario U ON O.id_usuario = U.id_usuario
				WHERE id_subasta='". $id_subasta."' ";
	$result = $db->query($query);

	return $result;
}	

function ofertaExitosaParaSubasta($id_subasta){
	
	include('db/connect.php');

	$query = "	SELECT * 
				FROM subasta S
				INNER JOIN oferta O ON S.id_subasta = O.id_subasta
				INNER JOIN usuario U ON O.id_usuario = U.id_usuario
				INNER JOIN oferta_exitosa E ON O.id_oferta = E.id_oferta
				WHERE S.id_subasta='". $id_subasta ."'";
	$result = $db->query($query);

	return $result;
}

?>