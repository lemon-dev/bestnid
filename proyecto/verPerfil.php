<?php 

	$pageTitle = "Bestnid | Perfil";
	include('include/header.php');
	include('db/connect.php');
?>
	<section>
		<div class="container perfil">
			<h2 id="perfilTitulo">Perfil de <?php echo $_SESSION['nombre_usuario'] ?></h2>
			<div class="row">
				
				<!--COLUMNA DE SUBASTAS-->
				<div class="container perfilSubastas col s6 m6"> 
					<h4>Subastas</h4>			
					<?php  
					$query = "SELECT *
							  FROM subasta S WHERE S.id_usuario='".$_SESSION["id_usuario"]."' ";

					($result = $db->query($query));

					while($row = $result->fetch_object()){ ?>
						
						<div class="card-panel grey lighten-5 z-depth-1">
								<div class="row">
									<div class="col s9">
										<a href="subasta.php?id_subasta=<?php echo $row->id_subasta ?>">
											<h5><?php echo $row->titulo ?></h5>
										</a>
									</div>
									<div class="col s1 right">
										<i id="perfilEliminarSubasta" class="mdi-navigation-cancel"></i>
									</div>
								</div>
								<p><?php echo $row->descripcion ?></p>
								<p>Estado</p>
						</div>
					<?php } ?>
				</div>

				<!--COLUMNA DE OFERTAS-->
				<div class="container perfilOfertas col s6 m6">
					<h4>Ofertas</h4>
					<?php  
					$query = "SELECT *
							  FROM oferta F INNER JOIN subasta S ON F.id_subasta=S.id_subasta WHERE  F.id_usuario='".$_SESSION["id_usuario"]."' ";

					($result = $db->query($query));

					while($row = $result->fetch_object()){ ?>
						<div class="card-panel grey lighten-5 z-depth-1">
							<div class="row">
								<div class="col s9">
									<a href="subasta.php?id_subasta=<?php echo $row->id_subasta ?>">
										<h5><?php echo $row->titulo ?></h5>
									</a>
								</div>
								<div class="col s1 right">
									<i id="perfilEliminarOferta" class="mdi-navigation-cancel"></i>
								</div>
							</div>
							<p><?php echo $row->necesidad ?></p>
							<div class="row">
								<div class="col s6 m6 l9">
									<p>Monto: $<?php echo $row->precio ?></p>
								</div>
								<div class="col s6 m6 l3">
									<a class="waves-effect waves-light btn  abrirEditarPrecio" data-id="<?php echo $row->id_oferta ?>" href="#modalPrecio">
										<i class="mdi-editor-mode-edit "></i>
									</a>
								</div>
							</div>
							<p>Estado</p>
						</div>
					<?php } ?>
				</div>

			</div>
		</div>
	</section>


	<!-- modal de terminos y condiciones -->
	<div id="modalPrecio" class="modal">
		<div class="modal-content">
			<h4 class="center">Modificar Precio</h4>
			<div class="row">
				<form action="function/ofertaEditarPrecio.php" method="post">
					<div class="row">
						<div class="input-field col s12">
							<input name="precio" id="precio" type="number" class="validate" required>
							    <label for="precio">Precio</label>
						</div>
						<input type="hidden" name="idOferta" id="idOferta" value=""/>
					</div>
					<input id="subasta-submit" type="submit" class="btn right form-submit" value="Aceptar">
					<a href="#!" class=" modal-action modal-close btn red left">Cancelar</a>
				</form>
			</div>
		</div>
	</div>

	<?php  include("include/footer.php"); ?>