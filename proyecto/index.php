<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    include("db/connect.php");
?>

<?php 
	$pageTitle = "Bestnid";
	include("include/header.php"); 
?>

<nav class="red darken-1">
  <ul class="right hide-on-med-and-down">
    <li><a href="#!">First Sidebar Link</a></li>
    <li><a href="#!">Second Sidebar Link</a></li>
  </ul>
  <ul id="slide-out" class="side-nav">
    <li><a href="#!">First Sidebar Link</a></li>
    <li><a href="#!">Second Sidebar Link</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
</nav>

<section>
	<div class="container">
		<div class="container">
			<div class="row col m12">	
				<header>
					<h2>Subastas del sitio</h2>	
				</header>
			</div>

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
		</div>

		<!--div class="container">
			<div class="row">
				<form action="/function/ordenar.php" method="post" class="col s12">
					<div class="input-field">
						<select name="criterio">
							<option value="titulo">Titulo</option>
							<option value="fecha_final">Fecha de Fin</option>
							<option value="fecha_inicio">Fecha de Inicio</option>
							<option value="categoria">Categoria</option>
						</select>
					</div>
				</form>
			</div>
		</div-->

		<div class="">
			<div class="row">
				<?php
					$query = "	SELECT 	*
								FROM	Subasta S INNER JOIN Producto P ON S.id_producto = P.id_producto";

					($result = $db->query($query)); 

					while ($row = $result->fetch_object()) { ?>
						
				        <div class="col s4 m6">
				          	<div class="card">
				            	<div class="card-image">
				              		<img class="responsive-img" src="<?php echo $row->imagen_url ?>">
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
</section>

<?php include("include/footer.php") ?>
	
</body>
</html>



