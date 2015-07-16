<?php 

if(isset($_GET['desde'], $_GET['hasta'])):
	//echo $_GET['desde'] . ' ' . $_GET['hasta'] . ' ';
	include('../db/functions.php');
	$subastas = subastas_exitosas_entre($_GET['desde'], $_GET['hasta']);

else: 
	$subastas = subastas_exitosas();
endif;

$total = 0;

if($subastas->num_rows > 0): while($subasta = $subastas->fetch_object()): 
	$total += $subasta->precio * 0.3;
?>
	<li class="grey lighten-2 z-depth-2 collection-item avatar">
		<img src="<?php echo $subasta->imagen_url ?>" alt="Imagen" class="circle">
		<span class="title"><?php echo $subasta->titulo ?></span>
		<p><?php echo $subasta->nombre ?></p>
		<p class="secondary-content">$<?php echo $subasta->precio * 0.3 ?></p>
	</li>

<?php endwhile; else: ?>
	
<?php endif; ?>