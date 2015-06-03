<?php
   
    error_reporting(-1);
    ini_set('display_errors', 'On');
    
   $pageTitle = "Bestnid | Ordenar";
    include("../include/header.php");

    include("../db/connect.php");
?>


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
					  <form method="get" action="../function/buscar_titulo.php">
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
		
	
		<form method="get" action="ordenar.php">
			<select name="criterio">
				<option value="titulo">Titulo</option>
				<option value="fecha_final">Fecha de Fin</option>
				<option value="fecha_inicio">Fecha de inicio</option>
				<option value="categoria">Categoria</option>

			</select>
			<input type="submit" value="Ordenar" >
		</form>

		<div class="">
			<div class="row">
				<?php
					$criterio = $_GET["criterio"];
					if ($criterio == "categoria" ){
						$query = "	SELECT 	*
								FROM	Subasta S INNER JOIN  Producto P ON S.id_producto = P.id_producto
										INNER JOIN Categoria C ON P.id_categoria = C.id_categoria 
								ORDER BY C.nombre ";

					}else{
						$query = "	SELECT 	*
									FROM	subasta S INNER JOIN producto P ON S.id_producto = P.id_producto
									ORDER BY  $criterio ";	
					}

					($result = $db->query($query)); 

					while ($row = $result->fetch_object()) { ?>
						
				        <div class="col s12 m6">
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

<?php include("../include/footer.php") ?>
	
</body>
</html>



