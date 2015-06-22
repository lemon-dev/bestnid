<?php 

session_start();
error_reporting(-1);
ini_set('display_errors', 'On');

$data = array();
$errors = array();

if(isset($_POST)){

	if(isset($_POST['id_oferta'], $_POST['id_subasta'])){

		include('../db/connect.php');

		$query = "	INSERT INTO oferta_exitosa (id_oferta_exitosa, id_oferta)
					VALUES (NULL, '" . $_POST['id_oferta'] . "')";

		$result = $db->query($query);

		header('Location: /ofertas.php?id_subasta=' . $_POST['id_subasta']);

	} else {
		echo ":(";
		die();
	}

}