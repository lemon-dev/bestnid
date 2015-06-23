<?php  

session_start();
error_reporting(-1);
ini_set('display_errors', 'On');

$errors 	= array();
$data		= array();

include('../db/connect.php');



	


if(isset($_POST)){
	if(isset($_POST['subastaTitulo'], $_POST['subastaImagenUrl'], $_POST['subastaDesc'], $_POST['subastaFechaFin'], $_POST['subastaCategorias'])) {
		
		require_once('../db/sanitize_input.php');

		$subastaTitulo = sanitize($_POST['subastaTitulo']);
		$subastaImagenUrl = sanitize($_POST['subastaImagenUrl']);
		$subastaDesc = sanitize($_POST['subastaDesc']);
		$subastaCategorias=$_POST['subastaCategorias'];
		$subastaDias=$_POST['subastaFechaFin'];
		


		$query = " INSERT INTO producto (id_producto, id_categoria, nombre, imagen_url)
					VALUES (NULL, '".$subastaCategorias."','".$subastaTitulo."','".$subastaImagenUrl."')";


		
		

		if(!$result = $db->query($query)) {
			$errors['db_error_prod'] = 'Error registrando el producto.';
		}
		$id_producto=$db->insert_id;	 //guardamos el id del ultimo product insertado en la base de datos;
		
		$query = " INSERT INTO subasta (id_subasta, id_producto, id_usuario, titulo, fecha_final, descripcion, fecha_inicio)
					VALUES (NULL,'". $id_producto ."', '" . $_SESSION['id_usuario'] . "', '".$subastaTitulo."', DATE_ADD(CURRENT_DATE(), INTERVAL '".$subastaDias."'  DAY) , '".$subastaDesc."', CURRENT_DATE())";

		//$errors['db'] = $consulta;
		if(!$result = $db->query($query)) {
			$errors['db_error_subasta'] = 'Error registrando la subasta.';
		}
		$id_subasta=$db->insert_id;

		if(!empty($errors)) {
			
			$data['success'] = false;
		    $data['errors']  = $errors;


		} else {

			$data['success'] = true;
		    $data['message'] = 'Se ha registrado la subasta con exito!';
		    $data['id_subasta'] = $id_subasta;

		}

		echo json_encode($data);
	}
	
}
	
//echo json_encode($data);

?>
