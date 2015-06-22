<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');

$data = array();
$errors = array();

if(isset($_POST)){

	if(isset($_POST['id_consulta'], $_POST['cuerpo'])){

		include('../db/connect.php');
		
		$query = "	INSERT INTO respuesta (id_respuesta, id_consulta, cuerpo)
					VALUES (NULL, '" . $_POST['id_consulta'] . "', '" . $_POST['cuerpo'] . "')";

		$result = $db->query($query);

		header('Location: /subasta.php?id_subasta='.$_POST['id_subasta']);
	}

}