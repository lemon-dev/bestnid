<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    include("db/connect.php");
?>

<?php include("include/header.php") ?>

<form method="get" action="function/ordenar.php">
	<select name="criterio">
		<option value="titulo">Titulo</option>
		<option value="fecha_fin">Fecha de Fin</option>
		<option value="categoria">Categoria</option>
	</select>
	<input type="submit" value="Ordenar">
</form>

<?php 
	include("function/listar_subasta.php"); 
?>

<?php include("include/footer.php") ?>
	
</body>
</html>



