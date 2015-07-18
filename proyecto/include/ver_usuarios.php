<?php 

if(isset($_GET['desde'], $_GET['hasta'])):
	//echo $_GET['desde'] . ' ' . $_GET['hasta'] . ' ';
<<<<<<< Updated upstream
	include($_SERVER['DOCUMENT_ROOT'].'/db/functions.php');
=======
	require_once($_SERVER['DOCUMENT_ROOT'] . '/db/functions.php');
>>>>>>> Stashed changes
	$usuarios = listar_usuarios_entre($_GET['desde'], $_GET['hasta']);

else: 
	$usuarios = listar_usuarios();
endif;

$total = 0;
?>

<ul id="reporte_usuarios">

<?php if($usuarios->num_rows > 0): while($usuario = $usuarios->fetch_object()): 
	$total += 1;
?>
	<li class="grey lighten-2 z-depth-1 card-panel ">
		<div class="row">
			
			<div class="col s12 m12 l6">
				<h6>Nombre y Apellido: <?php echo $usuario->nombre, " " ,$usuario->apellido ?></h6>
				<h6>Nombre de Usuario: <?php echo $usuario->nombre_usuario ?></h6>
			</div>
			<div class="col s12 m12 l6 ">
				<h6>Email: <?php echo $usuario->email ?></h6>
				<h6>Fecha de Alta: <?php echo $usuario->fecha_alta ?></h6>
			</div>
		
		</div>
	</li>

<?php endwhile;?>

</ul>

<div class="card-panel <?php echo ($total > 0 ? 'green' : 'red') ?> z-depth-1 resumen">
	<div class="row">
		<p class="left">Total de usuarios:</p>
		<p class="right"><?php echo $total ?></p>
	</div>
</div>

<?php else: ?>
	<h5>No hay resultados.</h5>
<?php endif; ?>