<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    include("../db/connect.php");
?>

<?php 
	$pageTitle = "Bestnid | Ordenar";
	include("../include/header.php"); 
?>

<form method="get" action="ordenar.php">
	<select name="criterio">
		<option value="titulo">Titulo</option>
		<option value="fecha_final">Fecha de Fin</option>
		<option value="fecha_inicio">Fecha de inicio</option>
		<option value="categoria">Categoria</option>

	</select>
	<input type="submit" value="Ordenar" >
</form>

<?php 
	$criterio = $_GET["criterio"];
	if ($criterio == "categoria" ){
		$query = "	SELECT 	*
				FROM	Subasta S INNER JOIN  Producto P ON S.id_producto = P.id_producto
						INNER JOIN Categoria C ON P.id_categoria = C.id_categoria 
				ORDER BY C.nombre ";

	}else{
		$query = "	SELECT 	*
					FROM	Subasta 
					ORDER BY " . $criterio ;	
	}
	

	$result = $db->query($query); 
	while ($row = $result->fetch_object()) { 
		//echo'<br>'. $row->titulo . '<br>' . $row->descripcion. '<br>';
		?>
		<div class="col s12 m6">
          	<div class="card">
            	<div class="card-image">
              		<img src="<?php echo $row->imagen_url ?>">
            	</div>
            <div class="card-content">
				<span class="card-title black-text"><?php echo $row->titulo ?></span>
              	<p><?php echo $row->descripcion ?></p>
            </div>
            <div class="card-action">
              	<a href="#">Ver Subasta</a>
            </div>
          </div>
        </div>	  
	<?php } ?>

<?php include("../include/footer.php") ?>
	
</body>
</html>



