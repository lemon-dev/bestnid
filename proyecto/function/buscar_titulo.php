<?php 	
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Buscar";
include("../include/header.php"); 
include("../db/connect.php");
?>
<div class="section">
	<div class="container search-result">
		<div class="busqueda">
			<nav class="white">
				<div class="nav-wrapper">
				  <form method="get" action="/function/buscar_titulo.php">
				    <div class="input-field">
				      <input id="search" name="param_busqueda" type="search" required>
				      <label for="search"><i class="mdi-action-search black-text"></i></label>
				      <i class="mdi-navigation-close"></i>
				    </div>
				  </form>
				</div>
			</nav>
		</div>
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
			              	<a href="#">Ver Subasta</a>
			            </div>
			          </div>
			        </div>	  
				<?php } ?>
			</div>
	</div>
</div>
	
<?php include("../include/footer.php"); ?>

