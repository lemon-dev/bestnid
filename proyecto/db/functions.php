<?php 

/********************************
SUBASTAS
********************************/

function subastas() {
	include('connect.php');
	$query = "	SELECT 	*
				FROM	subasta S INNER JOIN producto P ON S.id_producto = P.id_producto
				ORDER BY fecha_inicio DESC";
	return $db->query($query);
}

function subastaConID($id_subasta) {
	include('db/connect.php');
	
	$query = "	SELECT 	*
				FROM	subasta S INNER JOIN producto P ON S.id_producto = P.id_producto
								  INNER JOIN categoria C ON P.id_categoria = C.id_categoria
				WHERE	S.id_subasta = " . $id_subasta;

	$result = $db->query($query);

	$row = $result->fetch_object();

	return $row;
}

function subastas_por_criterio($criterio) {
	include('connect.php');
	if ($criterio == "categoria" ){
		$query = "	SELECT 	*
				FROM	subasta S INNER JOIN  producto P ON S.id_producto = P.id_producto
						INNER JOIN categoria C ON P.id_categoria = C.id_categoria 
				ORDER BY C.nombre ";

	}else{
		$query = "	SELECT 	*
					FROM	subasta S INNER JOIN producto P ON S.id_producto = P.id_producto
					ORDER BY  $criterio DESC";	
	}

	return $db->query($query);
}

/********************************
OFERTAS
********************************/

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


/********************************
CATEGORIAS
********************************/

function categorias(){
	include('db/connect.php');
	$query = "SELECT * FROM categoria ORDER BY nombre";

	if(!$result = $db->query($query)){
		echo ":(";
		die();
	}

	return $result;
}

function categoriaTieneProducto($id_categoria) {
	include('connect.php');
	$query = "	SELECT * 
				FROM categoria C
				INNER JOIN producto P
				ON C.id_categoria = P.id_categoria
				WHERE C.id_categoria = '" . $id_categoria .  "'";

	$result = $db->query($query);

	return $result->num_rows != 0;
}

function eliminarCategoria($id_categoria) {
	//Elimina la categoria y devuelve el objeto de la consulta
	include('connect.php');
	$query = "DELETE FROM categoria WHERE id_categoria = '" . $id_categoria . "'";

	$result = $db->query($query);

	return $result;
}

function crearCategoria($nombre) {
	include('connect.php');
	$query = "INSERT INTO categoria (id_categoria, nombre) VALUES (NULL, '" . $nombre . "');";
	
	$result = $db->query($query);

	return $result;
}

function modificarCategoria($id_categoria, $nombre) {
	include('connect.php');
	$query = "UPDATE categoria SET nombre = '" . $nombre . "' WHERE id_categoria = '" . $id_categoria . "'";

	$result = $db->query($query);

	return $result;
}

?>