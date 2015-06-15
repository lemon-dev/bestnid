<?php 	
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Buscar";
include("../include/header.php"); 
include("../db/connect.php");
?>
<section>
	<div class="container search-result">
		
		<?php include('../include/search_bar.php') ?>
		
		<div class="container subastas">
			<div class="container" id="search-result-title">
				<header>
					<h4>Resultado de la busqueda sobre:  "<?php echo $_GET["param_busqueda"] ?>"</h4>
					<p></p>
				</header>
			</div>
			<div class="row">
				<?php 
					$query = " 	SELECT *
								FROM subasta S
								INNER JOIN  producto P ON S.id_producto = P.id_producto
								WHERE titulo LIKE '%" . $_GET["param_busqueda"] . "%'";
					
					$result = $db->query($query); 
					
					while ($row = $result->fetch_object()) {
						
						?>
					<div class="col s12 m6">
			          	<div class="card">
			            	<div class="card-image">
			              		<img src="<?php echo $row->imagen_url ?>">
			            	</div>
			            <div class="card-content">
							<span class="card-title black-text"><?php echo $row->titulo ?></span>
			              	<p><?php echo $row->descripcion ?></p>
			              	<p>La subasta comenz&oacute; el d&iacute;a <?php echo $row->fecha_inicio ?></p>
			              	<p>La subasta finalize el d&iacute;a <?php echo $row->fecha_final ?></p>
			            </div>
			            <div class="card-action">
			              	<a href="/subasta.php?id_subasta=<?php echo $row->id_subasta ?>">Ver Subasta</a>
			            </div>
			          </div>
			        </div>	  
				<?php } ?>
				</div>
		</div>
	</div>
</section>
	
<?php include("../include/footer.php"); ?>

