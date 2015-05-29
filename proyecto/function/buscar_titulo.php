<?php 	
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Buscar";
include("../include/header.php"); 
include("../db/connect.php");
?>

<?php 
	$query = " 	SELECT *
				FROM Subasta S
				INNER JOIN  Producto P ON S.id_producto = P.id_producto
				WHERE Titulo LIKE '%" . $_GET["param_busqueda"] . "%'
	";
	$result = $db->query($query); 
	while ($row = $result->fetch_object()) {
		echo '<br>' . $row->titulo . '<br>' . $row->descripcion, '<br>';
	} 
?>
	
<?php include("../include/footer.php"); ?>

