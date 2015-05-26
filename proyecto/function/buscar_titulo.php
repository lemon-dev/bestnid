<?php
$pageTitle = "Bestnid | Busqueda"; 
include("../include/header.php"); 
include("../db/connect.php");
?>

<?php 
	$query = " 	SELECT *
				FROM Subasta
				WHERE Titulo LIKE '%" . $_GET["param_busqueda"] . "%'
	";
	$result = $db->query($query); 
	while ($row = $result->fetch_object()) {
		echo $row->titulo . '<br>' . $row->descripcion, '<br>';
	} 
?>
	
<?php include("../include/footer.php"); ?>

