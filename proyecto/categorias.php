<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Categorias";
include('include/header.php');
include('db/functions.php');

?>	

<div class="container categorias">
	
	<h3 class="categoria-header">Categorias</h3>

	<div class="card-panel grey lighten-5 z-depth-1 categoria">
		<h5></h4>
		<div class="row">
			<form method="post" action="function/categoriaCrear.php" class="input-field col s12" >
				<label for="name">Nombre</label>	
				<input name="nombre" type="text">
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