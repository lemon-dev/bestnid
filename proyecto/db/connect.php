<?php
	$username = "root";
	$password = "powerofdata";
	$host = "localhost";
	$dbname = "bestnid";

	$db = new mysqli($host, $username, $password, $dbname);

	if($db->connect_errno) {
		echo $db->connect_error;
	}
?>
