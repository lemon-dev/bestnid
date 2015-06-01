<?php

function user_exists($name) {
	include('connect.php');
	$result = $db->query(' 	SELECT * 
							FROM Usuario 
							WHERE nombre = . mysql_real_escape_string($name)');
	
	
	return $result->num_rows = 0;
}

?>