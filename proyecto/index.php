<?php

$pageTitle = "Bestnid | Home"; 
include("include/header.php");
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
		
	
		<form id="ordenar" method="get" action="">
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
			<div id="main-container" class="row">
				<?php include('include/ver_subastas.php'); ?>
			</div>
		</div>
	</div>	
</section>

<?php include("include/footer.php") ?>
	
</body>
</html>



