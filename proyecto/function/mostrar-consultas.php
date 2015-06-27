<?php 

require_once('../db/connect.php');

$query = " SELECT * FROM subasta WHERE id_subasta='" .  $_GET['id_subasta'] . "'";

if(!$result = $db->query($query)){
	echo ':(';
	die();
}

while ($row = $result->fetch_object()){ ?>

	<li>
		<div class="collapsible-header consulta"><i class="mdi-communication-messenger"></i>Consulta1</div>
		<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
	</li>

<?php } ?>