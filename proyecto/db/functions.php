<?php 
/********************************
USUARIOS
********************************/
function usuarios() {
	include('connect.php');
	$query = "	SELECT 	*
				FROM	usuario S 
				WHERE S.id_rol='1'
				ORDER BY fecha_alta DESC
				";
	return $db->query($query);
}
/********************************
SUBASTAS
********************************/

function subastas() {
	include('connect.php');
	$query = "	SELECT 	*
				FROM	subasta S INNER JOIN producto P ON S.id_producto = P.id_producto
				INNER JOIN categoria C ON P.id_categoria = C.id_categoria 
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

function subastas_por_criterio($criterio = "C.nombre") {
	include('connect.php');
	if ($criterio != "categoria" )
		$query_string = $criterio . " DESC";
	
	$query = "	SELECT 	*
				FROM	subasta S INNER JOIN  producto P ON S.id_producto = P.id_producto
						INNER JOIN categoria C ON P.id_categoria = C.id_categoria 
				ORDER BY " . $query_string;

	return $db->query($query);
}

function subastas_exitosas() {
	include('connect.php');

	$query = "SELECT * 
			FROM oferta_exitosa E 
			INNER JOIN oferta O 
			ON E.id_oferta = O.id_oferta
			INNER JOIN subasta S
			ON S.id_subasta = O.id_subasta
			INNER JOIN producto P 
			ON S.id_producto = P.id_producto
			INNER JOIN categoria C 
			ON P.id_categoria = C.id_categoria ";

	return $db->query($query);
}

function subastas_exitosas_entre($fecha_desde, $fecha_hasta) {
	include('connect.php');
	

	$query = "SELECT * FROM oferta_exitosa E
			INNER JOIN oferta O ON E.id_oferta = O.id_oferta 
    		INNER JOIN subasta S ON S.id_subasta = O.id_subasta
    		INNER JOIN producto P ON S.id_producto = P.id_producto
    		INNER JOIN categoria C ON P.id_categoria = C.id_categoria
    		WHERE S.fecha_final BETWEEN '" . $fecha_desde . "' AND '" . $fecha_hasta . "'";

    		//echo $query;

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
OFERTAS
********************************/

function yaOferto($id_usuario, $id_subasta){
	include('db/connect.php');
	$query = "	SELECT 	*
				FROM	subasta S INNER JOIN oferta O ON S.id_subasta = O.id_subasta
				WHERE	O.id_usuario = " . $id_usuario . " AND S.id_subasta = " . $id_subasta;

	if(!$result = $db->query($query)){
		echo ":(";
		die();
	}

	if($result->num_rows != 0){
		return true;
	}
	return false;
}

/********************************
CONSULTAS
********************************/

function consultasParaSubasta($id_subasta){
	include('db/connect.php');

	$query = " SELECT * FROM consulta WHERE id_subasta=" .  $_GET['id_subasta'];

	if(!$result = $db->query($query)){
		echo ':(';
		die();
	}

	return $result;
}

/********************************
RESPUESTAS
********************************/

function respuestaParaConsulta($id_consulta){
	include('db/connect.php');

	$query = " SELECT * FROM respuesta WHERE id_consulta=" . $id_consulta;

	$result = $db->query($query);

	return $result;
}


/********************************
CATEGORIAS
********************************/

function categorias(){
	require_once($_SERVER['DOCUMENT_ROOT'] .'/db/connect.php');
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