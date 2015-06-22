<?php 

session_start();
error_reporting(-1);
ini_set('display_errors', 'On');

$data = array();
$errors = array();

if(isset($_POST)){

	if(isset($_POST['consulta'], $_POST['id_subasta'])){
		
		$query = "	INSERT INTO consulta (id_consulta, id_subasta, cuerpo)
					VALUES (NULL, '" . $_POST['id_subasta'] . "', '" . $_POST['consulta'] . "')";

		require_once('../db/connect.php');

		if($result = $db->query($query)){
			header('Location: /index.php');
		} else {
			echo ':(';
			die();
		}

		header('Location: /subasta.php?id_subasta='. $_POST['id_subasta']);
	}
}

 ?>