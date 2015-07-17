<?php 

$usuarios = usuarios();
$total = 0;

if($usuarios->num_rows > 0): while($usuario = $usuarios->fetch_object()): 
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

<?php endwhile; else: ?>
	<h5>No hay resultados.</h5>
<?php endif; ?>