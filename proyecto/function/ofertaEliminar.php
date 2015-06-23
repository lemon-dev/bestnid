<?php
	session_start();
	error_reporting(-1);
	ini_set('display_errors', 'On');

	include('../db/connect.php');

	if(isset($_POST)){
		if(isset($_POST['idOferta'])){

			//borramos todas las ofertas que pertenecen a la subasta
			$query="DELETE FROM oferta WHERE id_oferta ='".$_POST['idOferta']."'";
			
			if($result = $db->query($query)){
				header('Location: /verPerfil.php');
			}					
			
		}
	}

?>