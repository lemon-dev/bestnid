<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    include("db/connect.php");
?>

<?php 
	$pageTitle = "Bestnid";	
	include("include/header.php") 
?>

<form method="get" action="function/ordenar.php">
	<select name="criterio">
		<option value="titulo">Titulo</option>
		<option value="fecha_fin">Fecha de Fin</option>
		<option value="categoria">Categoria</option>
	</select>
	<input type="submit" value="Ordenar">
</form>

<?php 
	$query = "	SELECT 	*
				FROM	Subasta";

	($result = $db->query($query)); 

	while ($row = $result->fetch_object()) {
		echo $row->titulo . '<br>' . $row->descripcion, '<br>';
	}
?>

<?php include("include/footer.php") ?>
	
</body>
</html>



