<?php
$categorias =  categorias();

while($categoria = $categorias->fetch_object()):  ?>
	
	<div class="card-panel grey lighten-5 z-depth-1">
		<div class="row">
			<a class="col s8 m8 l8 left categoria-nombre col s6 m6 l6" href="#!"><?php echo $categoria->nombre ?></a>
			<a id="editarCategoria" class="btn" href="#!"><i class="mdi-editor-mode-edit"></i></a>

			<form method="post" action="function/categoriaEliminar.php">
				<input type="hidden" name="id_categoria" value="<?php echo $categoria->id_categoria ?>">
				<input id="eliminar-categoria-submit" type="submit" name="nombre" class="btn red right" value="X">	
			</form>

			<form class="modificar-categoria" method="post" action="function/categoriaModificar.php">
				<input type="text" name="nombre" placeholder="<?php echo $categoria->nombre ?>">
				<input type="hidden" name="id_categoria" value="<?php echo $categoria->id_categoria ?>">
				<input id="modificar-categoria-submit" type="submit" class="btn right form-submit" value="Modificar">
			</form>
		</div>
	</div>

<?php endwhile; ?>