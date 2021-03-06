<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Categorias";
include('include/header.php');

?>	

<div class="container categorias">
	
	<h3 class="categoria-header">Administrar Categorias</h3>

	<p>*Las categorias que ya tiene productos asignados no podrán ser borradas.</p>

	<div class="card-panel grey lighten-5 z-depth-1 categoria">
		<div class="row">
			<form id="crear-subasta" method="post" action="function/categoriaCrear.php" class="input-field col s12" >
				<label for="name">Nombre</label>	
				<input name="nombre" type="text" required>
				<input type="submit" class="btn right form-submit" value="Crear">
			</form>
		</div>
	</div>
	
	<div class="container categorias-disponibles">
		<div id="categorias">
			<?php include('include/ver_categorias.php'); ?>
		</div>
	</div>

</div>



<?php include('include/footer.php'); ?>