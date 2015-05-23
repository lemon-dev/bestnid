<?php
	$username = "root";
	$password = "powerofdata";
	$host = "bestnid.com";
	$dbname = "bestnid";

	$db = new mysqli($host, $username, $ password, $dbname);

	if($db->connect_errno) {
		echo $db->connect_error;
	}
?>
