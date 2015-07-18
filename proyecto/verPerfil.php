<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Perfil";
include('include/header.php');
include('db/connect.php');
include('db/functions.php');
?>
	
<?php if(isset($_GET['status'])){

	if($_GET['status'] == 'failSubasta') {?>

		<div class="container operation-result" id="eliminar-usuario-result">
			<div class="row">
				<h3>Ups :(</h3>
				<p>No puede eliminar su cuenta si tiene subastas activas!</p>
				<a class="btn center" href="verPerfil.php">Volver</a>
			</div>
		</div>

	<?php } 

	if($_GET['status'] == 'failOferta') {?>
	
		<div class="container operation-result" id="eliminar-usuario-result">
			<div class="row">
				<h3>Ups :(</h3>
				<p>No puede eliminar su cuenta si tiene ofertas exitosas!</p>
				<p>Por favor contáctese con el subastador y luego elimine la oferta desde su perfil.</p>
				<a class="btn center" href="verPerfil.php">Volver</a>
			</div>
		</div>

	<?php }

	if($_GET['status'] == 'success') {?>
		
		<div class="container operation-result" id="eliminar-usuario-result">
			<div class="row">
				<h3>Ha eliminado su cuenta con exito!</h3>
				<p>Esperamos verlo de vuelta por este maravilloso sitio.</p>
				<a class="btn center" href="index.php">Aceptar</a>
			</div>
		</div>

	<?php } 	

} else {?>

	<section>
		<div class="container perfil">
			<div class="row">
				<header class="form-header">
					<h2 id="perfilTitulo">Perfil de <?php echo $_SESSION['nombre'], " " ,$_SESSION['apellido'] ?></h2>
				</header>
			</div>
			<h4>Datos Personales</h4>
			<div class="card-panel grey lighten-5 z-depth-1">
				<div class="row">
					<div class="col s12 m12 l12">
						<a class="waves-effect waves-light red btn right abrirEliminarUsuario" data-id="<?php echo $_SESSION['id_usuario'] ?>" href="#modalEliminarUsuario">
							<i class="mdi-navigation-cancel "></i>
						</a>
					</div>
					<div class="col s12 m12 l6">
						<h5>Nombre de usuario: <?php echo $_SESSION['nombre_usuario'] ?></h5>
						<h5>DNI: <?php echo $_SESSION['dni'] ?></h5>
					</div>
					<div class="col s12 m12 l6">
						<h5>Email: <?php echo $_SESSION['email'] ?></h5>
						<h5>CBU: <?php echo $_SESSION['tarjeta'] ?></h5>
						<a class="waves-effect waves-light btn right  abrirEditarUsuario" 
										data-nombre="<?php echo $_SESSION['nombre'] ?>" 
										data-apellido="<?php echo $_SESSION['apellido'] ?>" 
										data-dni="<?php echo $_SESSION['dni'] ?>" 
										data-email="<?php echo $_SESSION['email'] ?>" 
										data-tarjeta="<?php echo $_SESSION['tarjeta']?>" 
										data-id="<?php echo $_SESSION['id_usuario'] ?>" href="#modalEditarUsuario">
							<i class="mdi-editor-mode-edit"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				
				<!--COLUMNA DE SUBASTAS-->
				<div class="container perfilSubastas col s6 m6"> 
					<h4>Subastas</h4>			
					<?php  
					$query = "SELECT *
							  FROM subasta S INNER JOIN producto P ON S.id_producto = P.id_producto
							  WHERE S.id_usuario='".$_SESSION["id_usuario"]."' 
							  ORDER BY fecha_final DESC";

					($result = $db->query($query));

					if($result->num_rows > 0){
						while($row = $result->fetch_object()){ ?>							
							<div class="card-panel grey lighten-5 z-depth-1">
								<div class="row">
									<div class="col s6 m6 l9">
										<a href="subasta.php?id_subasta=<?php echo $row->id_subasta ?>">
											<h5><?php echo $row->titulo ?></h5>
										</a>
									</div>
									<div class="col s6 m6 l3 ">
										<a class="waves-effect waves-light red btn abrirEliminarSubasta" data-id="<?php echo $row->id_subasta ?>" href="#modalEliminarSubasta">
											<i class="mdi-navigation-cancel "></i>
										</a>
									</div>
								</div>
								<p><?php echo $row->descripcion ?></p>
								<?php if($row->fecha_final>date('Y-m-d')){ ?>
								<div class="row">
									<div class="col s6 m6 l9">
										<p></p>
									</div>
									<div class="col s6 m6 l3">
										<a class="waves-effect waves-light btn  abrirEditarSubasta" 
										data-idsubasta="<?php echo $row->id_subasta ?>" data-titulo="<?php echo $row->titulo ?>" 
										data-url="<?php echo $row->imagen_url ?>" data-descripcion="<?php echo $row->descripcion ?>" 
										data-idproducto="<?php echo $row->id_producto ?>" href="#modalEditarSubasta">
											<i class="mdi-editor-mode-edit "></i>
										</a>
									</div>
								</div>
								<?php } ?>
								<p>Estado: <?php if($row->fecha_final>date('Y-m-d')){
									echo "activa.";
									}else{
										echo "finalizada.";
									}?></p>
							</div>
						<?php }
					}
					else{ ?>
						<div class="card-panel grey lighten-5 z-depth-1">
							<h5>No has realizado ninguna subasta.</h5>
						</div>
					<?php } ?>
				</div>

				<!--COLUMNA DE OFERTAS-->
				<div class="container perfilOfertas col s6 m6">
					<h4>Ofertas</h4>
					<?php  
					$query = "SELECT *
							  FROM oferta F INNER JOIN subasta S ON F.id_subasta=S.id_subasta 
							  WHERE  F.id_usuario='".$_SESSION["id_usuario"]."' 
							  ORDER BY fecha_final DESC";

					($result = $db->query($query));

					if($result->num_rows > 0){
						while($row = $result->fetch_object()){ ?>
							<div class="card-panel grey lighten-5 z-depth-1">
								<div class="row">
									<div class="col s6 m6 l9">
										<a href="subasta.php?id_subasta=<?php echo $row->id_subasta ?>">
											<h5><?php echo $row->titulo ?></h5>
										</a>
									</div>
									<div class="col s6 m6 l3 ">
										<a class="waves-effect waves-light red btn abrirEliminarOferta" data-id="<?php echo $row->id_oferta ?>" href="#modalEliminarOferta">
											<i class="mdi-navigation-cancel "></i>
										</a>
									</div>
								</div>
								<p><?php echo $row->necesidad ?></p>
								<div class="row">
									<div class="col s6 m6 l9">
										<p>Monto: $<?php echo $row->precio ?></p>
									</div>
									<?php if($row->fecha_final>date('Y-m-d')){ ?>
									<div class="col s6 m6 l3">
										<a class="waves-effect waves-light btn  abrirEditarPrecio" data-id="<?php echo $row->id_oferta ?>" href="#modalPrecio">
											<i class="mdi-editor-mode-edit "></i>
										</a>
									</div>
									<?php } ?>
								</div>
								<p>Estado de la subasta: 
									<?php echo ($row->fecha_final>date('Y-m-d') ? 'activa.' : 'finalizada.') ?>
								</p>
								
								<?php if(tieneOfertaExitosa($row->id_subasta)): ?>
	
									<?php if(esOfertaGanadora($row->id_oferta)): ?>

										<h5>¡Tu oferta es la ganadora! </h5>
										<p>Vaya a la subasta para obtener los datos de contacto del subastador</p>

									<?php else: ?>

										<h5>Tu oferta no ha sido elegida</h5>

									<?php endif; ?>

								<?php elseif($row->fecha_final < date('Y-m-d')): ?>

									<p>El subastador aun debe elegir la oferta ganadora.</p>

								<?php endif; ?>
					
							</div>
						<?php } 
					}
					else{ ?>
						<div class="card-panel grey lighten-5 z-depth-1">
							<h5>No has realizado ninguna oferta.</h5>
						</div>
					<?php } ?>
				</div>

			</div>
		</div>
	</section>
<?php } ?>

	<!-- modal de eliminar subasta -->
	<div id="modalEliminarSubasta" class="modal">
		<div class="modal-content">
			<h4 class="center">¿Desea eliminar la subasta?</h4>
			<div class="row">
				<form action="function/subastaEliminar.php" method="post">
					<div class="row">
						<input type="hidden" name="idSubasta" id="idSubasta" value=""/>
					</div>
					<input id="subasta-eliminar-submit" type="submit" class="btn right red form-submit" value="Eliminar">
					<a href="#!" class=" modal-action modal-close btn left">Cancelar</a>
				</form>
			</div>
		</div>
	</div>

	<!-- MODAL ELIMINAR USUARIO -->
	<div id="modalEliminarUsuario" class="modal">
		<div class="modal-content">
			<h4 class="center">¿Desea eliminar su cuenta de Bestnid?</h4>
			<div class="row">
				<form action="function/usuarioEliminar.php" method="post">
					<div class="row">
						<input type="hidden" name="idUsuario" id="idUsuario" value=""/>
					</div>
					<input id="usuario-eliminar-submit" type="submit" class="btn right red form-submit" value="Eliminar">
					<a href="#!" class=" modal-action modal-close btn left">Cancelar</a>
				</form>
			</div>
		</div>
	</div>

	<!-- MODAL EDITAR USUARIO-->
	<div id="modalEditarUsuario" class="modal">
		<div class="modal-content">
			<h4 class="center">Modificar Usuario</h4>
			<div class="row">
				<form action="" method="post" id="editarUsuarioForm">
					<div class="row">
						<label for="nombre">Nombre</label>
				        <div class="input-field col s12">
				          	<input name="nombre" id="nombre" type="text" class="validate" required>
				          	<span id="name-hint" class="text-hint warning">* El nombre solo puede contener letras, caracteres invalidos han sido omitidos.<span>		  	
				        </div>
		     		</div>
		     		<div class="row">
		     			<label for="apellido">Apellido</label>
				        <div class="input-field col s12">
				          	<input name="apellido" id="apellido" type="text" class="validate" required>
		          			<span id="lastname-hint" class="text-hint warning">*El apellido solo puede contener letras, caracteres invalidos han sido omitidos<span>
				        </div>
		     		</div>
		     		<div class="row">
		     			<label for="dni">DNI (Documento Nacional de Identidad)</label>
				        <div class="input-field col s12">
				          	<input name="dni" id="dni" type="text" class="validate active" placeholder="Ejemplo: xx.xxx.xxx"  required>
		          			<span id="dni-hint" class="text-hint warning">* El dni solo puede contener numeros,caracteres invalidos han sido omitidos</span>
				        </div>
		     		</div>
		     		<div class="row">
		     			<label for="email">E-mail</label>
				        <div class="input-field col s12">
				          	<input name="email" id="email" type="email" class="validate active" required>
				        </div>
		     		</div>
					<div class="row">
						<label for="password">Contraseña nueva</label>
				        <div class="input-field col s12">
				          	<input name="password" id="password" type="password" class="validate" required>
				        </div>
		     		</div>
		     		<div class="row">
		     			<label for="val_password">Confirmación de contraseña</label>
				        <div class="input-field col s12">
				          	<input name="val_password" id="val_password" type="password" class="validate" required>		          			
		          			<span id="pass-hint" class="text-hint error">* Las contraseñas no coinciden, por favor vuelva a intentarlo</span>
				        </div>
		     		</div>
		     		<div class="row">
		     			<label for="tarjeta">Num. tarjeta de credito</label>
				        <div class="input-field col s12">
				          	<input name="tarjeta" id="tarjeta" type="text" class="validate" placeholder="Ejemplo: xxxx xxxx xxxx" required>		          			
		          			<span id="tarjeta-hint" class="text-hint warning">* El num. de la tarjeta solo puede contener numeros,caracteres invalidos han sido omitidos</span>
				        </div>
		     		</div>
		     		<input type="hidden" name="idUsuario" id="idUsuario" value=""/>
					<div class="modal-footer">
						<input id="subasta-editar-submit" type="submit" class="btn right green form-submit" value="Aceptar" required>
						<a href="#!" class=" modal-action modal-close btn red left">Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- modal de eliminar oferta -->
	<div id="modalEliminarOferta" class="modal">
		<div class="modal-content">
			<h4 class="center">¿Desea eliminar la oferta?</h4>
			<div class="row">
				<form action="function/ofertaEliminar.php" method="post">
					<div class="row">
						<input type="hidden" name="idOferta" id="idOferta" value=""/>
					</div>
					<input id="subasta-eliminar-submit" type="submit" class="btn right red form-submit" value="Eliminar">
					<a href="#!" class=" modal-action modal-close btn left">Cancelar</a>
				</form>
			</div>
		</div>
	</div>

	<!-- modal de modificar precio -->
	<div id="modalPrecio" class="modal">
		<div class="modal-content">
			<h4 class="center">Modificar Precio</h4>
			<div class="row">
				<form action="function/ofertaEditarPrecio.php" method="post">
					<div class="row">
						<div class="input-field col s12">
							<input name="precio" id="precio" type="number" min="1" class="validate" required>
		          			<label for="precio">Precio</label>
		          			<span id="precio-invalido" class="text-hint error"></span>
						</div>
						<input type="hidden" name="idOferta" id="idOferta" value=""/>
					</div>
					<input id="subasta-submit" type="submit" class="btn right green form-submit" value="Aceptar">				
					<a href="#!" class=" modal-action modal-close btn red left">Cancelar</a>
				</form>
			</div>
		</div>
	</div>

	<!-- modal de modificar subasta -->
	<div id="modalEditarSubasta" class="modal">
		<?php 	$query= "SELECT * FROM categoria";
				$resultCat = $db->query($query); ?>
		<div class="modal-content">
			<h4 class="center">Modificar Subasta</h4>
			<div class="row">
				<form action="function/subastaEditar.php" method="post">
					<div class="row">
						<label for="subastaTitulo">Titulo</label>
				        <div class="input-field col s12">
				          	<input name="subastaTitulo" id="subastaTitulo" type="text" class="validate" required>		  	
				        </div>
		     		</div>
		     		<div class= "row">
		     			<div class="input-field col s12">
		     				<select name="subastaCategorias" id="subastaCategorias" class="browser-default">
							<?php 
								while ($row = $resultCat->fetch_object()) { ?>
								<option value="<?php echo $row->id_categoria ?>"><?php echo $row->nombre ?></option>
							<?php } ?>
							</select>
						</div>
		     		</div>
		     		<div class="row">
		     			<label for="subastaImagenUrl">Url de la imagen</label>
				        <div class="input-field col s12">
				          	<input name="subastaImagenUrl" id="subastaImagenUrl" type="text" class="validate" required>
		          			<span id="subastaImagenUrl-hint" class="text-hint error">* Por favor ingrese una url valido</span>
				        </div>
		     		</div>
					<div class="row">
					    <label for="subastaDesc">Descripcion</label>
						<div class="input-field col s12">
						  <textarea id="subastaDesc" name="subastaDesc" class="materialize-textarea validate " required></textarea>
						</div>
					</div>
					<input type="hidden" name="idSubasta" id="idSubasta" value=""/>
					<input type="hidden" name="idProducto" id="idProducto" value=""/>
					<div class="modal-footer">
						<input id="subasta-submit" type="submit" class="btn right green form-submit" value="Aceptar">
						<a href="#!" class=" modal-action modal-close btn red left">Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	

	

	<?php  include("include/footer.php"); ?>