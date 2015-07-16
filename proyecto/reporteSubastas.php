<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Reporte - Subastas";
include('include/header.php');
include('db/functions.php');
/*
if(isset($_GET['desde'], $_GET['hasta'])) {
	$fecha_desde = $_GET['desde'];
	$fecha_hasta = $_GET['hasta'];
	$subastas = subastas_exitosas($fecha_desde, $fecha_hasta);
} else $subastas = subastas_exitosas();
*/
?>



<div class="white container reporte">

	<h2>Subastas exitosas</h2>
	<br>
	
	<div class="row container fechas-form col s12 m12 l12">
		<p class="uso-fechas">Eliga las fechas entre las cuales se finalizaron las subastas para obtener el reporte especifico.</p>
		<form id="filtrar-subastas" action="">
			<p class="col m3">Desde: </p>
			<input name="desde" type="date" class="datepicker left col m3" required>
			<p class="col m3">Hasta: </p>
			<input name="hasta" type="date" class="datepicker right col m3" required>
			<input type="submit" class="btn right" value="Filtrar">
		</form>
	</div>
	
	<p>Resultados:</p>
	<ul id="subastas_exitosas" class="collection">
		<?php include('include/ver_subastas_exitosas.php') ?>
	</ul>

	<div class="card-panel <?php echo ($total > 0 ? 'green' : 'yellow') ?> z-depth-1 resumen">
		<div class="row">
			<p class="left">Ganancia total:</p>
			<p class="right">$<?php echo $total ?></p>
		</div>
	</div>
</div>


<?php include('include/footer.php'); ?>