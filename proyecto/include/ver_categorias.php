<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'] . '/db/functions.php');

$categorias =  categorias();

while($categoria = $categorias->fetch_object()):  ?>
	
	<div class="card-panel grey lighten-5 z-depth-1">
		<div class="row">
			<a class="btn left editarCategoria" href="#!"><i class="mdi-editor-mode-edit"></i></a>
			<a class="left categoria-nombre" href="#!"><?php echo $categoria->nombre ?></a>

			<form class="eliminar-categoria" method="post" action="function/categoriaEliminar.php">
				<input type="hidden" name="id_categoria" value="<?php echo $categoria->id_categoria ?>">
				<?php if(!categoriaTieneProducto($categoria->id_categoria)): ?><input id="eliminar-categoria-submit" type="submit" name="nombre" class="btn red right" value="X"> <?php endif; ?>	
			</form>

			<form class="modificar-categoria" method="post" action="function/categoriaModificar.php">
				<input type="text" name="nombre" placeholder="<?php echo $categoria->nombre ?>">
				<input type="hidden" name="id_categoria" value="<?php echo $categoria->id_categoria ?>">
				<input id="modificar-categoria-submit" type="submit" class="btn right form-submit" value="Modificar">
			</form>
		</div>
	</div>

<?php endwhile; ?>