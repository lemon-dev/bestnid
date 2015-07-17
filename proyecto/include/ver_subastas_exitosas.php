<?php 

if(isset($_GET['desde'], $_GET['hasta'])):
	//echo $_GET['desde'] . ' ' . $_GET['hasta'] . ' ';
	include('../db/functions.php');
	$subastas = subastas_exitosas_entre($_GET['desde'], $_GET['hasta']);

else: 
	$subastas = subastas_exitosas();
endif;

$total = 0;
?>

<ul id="subastas_exitosas" class="collection">

<?php if($subastas->num_rows > 0): while($subasta = $subastas->fetch_object()): 
	$total += $subasta->precio * 0.3;
?>
	<li class="grey lighten-2 collection-item avatar subasta-exitosa">
		<img src="<?php echo $subasta->imagen_url ?>" alt="Imagen" class="circle">
		<span class="title"><?php echo $subasta->titulo ?></span>
		<p><?php echo $subasta->nombre ?></p>
		<p class="secondary-content">$<?php echo $subasta->precio * 0.3 ?></p>
	</li>

<?php endwhile; ?> 

</ul>

<div class="card-panel <?php echo ($total > 0 ? 'green' : 'yellow') ?> z-depth-1 resumen">
	<div class="row">
		<p class="left">Ganancia total:</p>
		<p class="right">$<?php echo $total ?></p>
	</div>
</div>

<?php else: ?> 
	<h5>No hay resultados.</h5>
<?php endif; ?>