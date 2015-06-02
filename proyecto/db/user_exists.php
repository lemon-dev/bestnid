<?php

function user_exists($name) {
	include('connect.php');
	
	$user = $db->query("SELECT * FROM users WHERE user_name = '" . $name . "'");
	
	return $user->num_rows = 0;
}

?>