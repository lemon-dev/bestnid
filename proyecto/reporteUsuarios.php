<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Reporte - Usuarios";
include('include/header.php');
include('db/functions.php');

?>

<div class="white container reporte">

	<h2>Usuarios registrados</h2>
	<br>

	<div class="row container fechas-form col s12 m12 l12">
		<p class="uso-fechas">Eliga las fechas entre las cuales se registraron los usuarios para obtener el reporte especifico.</p>
		<form action="">
			<p class="col m3">Desde: </p>
			<input name="desde" type="date" class="datepicker left col m3">
			<p class="col m3">Hasta: </p>
			<input name="hasta" type="date" class="datepicker right col m3">
		</form>
	</div>

	<p>Resultados:</p>
	<ul >
		<!-- Acá se incluye el script que lista los usuarios el cual devuelve un $total-->
		<?php include('include/ver_usuarios.php') ?>
	</ul>

	<div class="card-panel <?php echo ($total > 0 ? 'green' : 'red') ?> z-depth-1 resumen">
		<div class="row">
			<p class="left">Total de usuarios:</p>
			<p class="right"><?php echo $total ?></p>
		</div>
	</div>
</div>


<?php include('include/footer.php'); ?>