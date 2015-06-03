<?php 	
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Buscar";
include("../include/header.php"); 
include("../db/connect.php");
?>
<div class="section">
	<div class="container">
		<div class="row">
			<?php 
				$query = " 	SELECT *
							FROM Subasta S
							INNER JOIN  Producto P ON S.id_producto = P.id_producto
							WHERE Titulo LIKE '%" . $_GET["param_busqueda"] . "%'
				";
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
			            </div>
			            <div class="card-action">
			              	<a href="#">Ver Subasta</a>
			            </div>
			          </div>
			        </div>	  
				<?php } ?>
			</div>
	</div>
</div>
	
<?php include("../include/footer.php"); ?>

