<?php
   
    error_reporting(-1);
    ini_set('display_errors', 'On');
    
    $pageTitle = "Bestnid"; 
    include("include/header.php");

    include("db/connect.php");
?>

<section>
	<div class="container">
		<div class="container bienvenida z-depth-2">
			<div class="row col m12">	
				<header>
					<h2>Bestnid!</h2>
					<p>Un sitio web para subastas distinto, en el cuál lo que más importa no es quien más da, sino quién más necesita.</p>
				</header>
			</div>
			
			<?php include('include/search_bar.php') ?>
		</div>
		
	
		<form method="get" action="function/ordenar.php">
			<div class="row">
				<div class="col s8 m8 l10">
					<select name="criterio" class="browser-default">
						<option value="titulo">Titulo</option>
						<option value="fecha_final">Fecha de Fin</option>
						<option value="fecha_inicio">Fecha de inicio</option>
						<option value="categoria">Categoria</option>

					</select>
				</div>
				<div class="col s4 m4 l2">
					<input type="submit" value="Ordenar" class="btn">
				</div>
			</div>
		</form>

		<div class="container subastas">
			<div class="row">
				<?php
					$query = "	SELECT 	*
								FROM	subasta S INNER JOIN producto P ON S.id_producto = P.id_producto";

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
				              	<p>La subasta comenz&oacute; el d&iacute;a <?php echo $row->fecha_inicio ?></p>
			              		<p>La subasta finaliza el d&iacute;a <?php echo $row->fecha_final ?></p>
				            </div>
				            <div class="card-action">
				              	<a href="subasta.php?id_subasta=<?php echo $row->id_subasta?>">Ver Subasta</a>
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



