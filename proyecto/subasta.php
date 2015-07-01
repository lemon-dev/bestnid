<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

include('db/connect.php');

include('db/functions.php');	

function yaOferto($id_usuario, $id_subasta){
	include('db/connect.php');
	$query = "	SELECT 	*
				FROM	subasta S INNER JOIN oferta O ON S.id_subasta = O.id_subasta
				WHERE	O.id_usuario = " . $id_usuario . " AND S.id_subasta = " . $id_subasta;

	if(!$result = $db->query($query)){
		echo ":(";
		die();
	}

	if($result->num_rows != 0){
		return true;
	}
	return false;
}

function consultasParaSubasta($id_subasta){
	include('db/connect.php');

	$query = " SELECT * FROM consulta WHERE id_subasta=" .  $_GET['id_subasta'];

	if(!$result = $db->query($query)){
		echo ':(';
		die();
	}

	return $result;
}

function respuestaParaConsulta($id_consulta){
	include('db/connect.php');

	$query = " SELECT * FROM respuesta WHERE id_consulta=" . $id_consulta;

	$result = $db->query($query);

	return $result;
}

?>

<?php 
	$subasta = subastaConID($_GET['id_subasta']);
	$pageTitle = "Bestnid | $subasta->titulo";
	include('include/header.php');	
 ?>
<?php $terminada = $subasta->fecha_final < date('Y-m-d') ?>

<div id="subasta" class="container ver-subasta z-depth-2 col m12 <?php if($terminada) echo 'box finalizada'; ?>">
	<header class="row center">
			<h3 class="z-depth-1"><?php echo $subasta->titulo ?></h3>
		</header>
	<section class="subasta">

		
		<ul class="row ver-subasta-header">
			<li class="col s12 m6 l6">
				<img class="materialboxed responsive-img" width="650" src="<?php echo $subasta->imagen_url ?>">
			</li>
			
			<li class="col s12 m6 l6">
				<div class="subasta-opciones">
					<p class="descripcion"><?php echo $subasta->descripcion ?></p>
					<p>Categoria : <?php echo $subasta->nombre ?></p>
					<p>Fecha de Inicio: <?php echo $subasta->fecha_inicio ?></p>
					<p>Fecha de Fin: <?php echo $subasta->fecha_final ?></p>
					<?php 	if($_SESSION){ ?>
						
							<?php 	if($subasta->id_usuario != $_SESSION['id_usuario']) {  

								if(!yaOferto($_SESSION['id_usuario'], $_GET['id_subasta'])) { ?>
									<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ofertar</a>

									<div id="modal1" class="modal">
										<div class="modal-content">
											<h4 class="center">Ofertar</h4>
											<div class="row">
												<form id="ofertar-form" action="function/ofertar-process.php" method="post">
													<div class="row">
														<div class="input-field col s12">
												          	<input name="precio" id="precio" type="number" class="validate" required>
										          			<label for="precio">Precio</label>
										          			<span id="precio-invalido" class="text-hint error"></span>
												        </div>
												        <div class="input-field col s12">
												          	<textarea name="necesidad" id="necesidad" class="materialize-textarea" required></textarea>
				          									<label for="necesidad">Necesidad</label>
												        </div>
												        <input type="hidden" name="id_subasta" value="<?php echo $_GET['id_subasta'] ?>">
										     		</div>	
													<input id="subasta-submit" type="submit" class="btn right form-submit" value="Ofertar">
													<a href="#!" class=" modal-action modal-close waves-effect waves-green btn red left">Cancelar</a>
												</form>
											</div>
										</div>
									</div>
								<?php   } else { 
											if(!$terminada) { ?>
											<span class="not-registered warning"> * Usted ya ha ofertado en esta subasta, para ver sus ofertas haga <a href="/verPerfil.php">click aquí</a>.</span>
								<?php }	} ?>
							<?php	} else { ?>
										<a class="waves-effect waves-light btn" href="ofertas.php?id_subasta=<?php echo $_GET['id_subasta']?>">Ver Ofertas</a>
							<?php 	} ?>
						
					<?php 	} else { ?>

						<a id="ofertar-btn" class="waves-effect waves-light btn disabled">Ofertar</a>
						<span class="not-registered warning"> * Haga <a href="/login.php?redirect_to=<?php echo $_GET['id_subasta'] ?>">click aquí</a> para iniciar sesión y poder Ofertar.</span>

					<?php 	} ?>
				</div>
			</li>
		</ul>
	</section>
	<?php 	if(!$terminada) { ?>
		<section class="container consultas">
			<div class="container">

					<h4>Consultas</h4>
					<?php 

					$consulta_query = consultasParaSubasta($_GET['id_subasta']);
					if($consulta_query->num_rows > 0){
							echo '<ul class="collection" data-collapsible="accordion">';
					}

					while ($consulta = $consulta_query->fetch_object()){ ?>
						
						<li>
							<div class="collection-item dialogo consulta z-depth-2 row" data-consultaId="<?php echo $consulta->id_consulta ?>">
								<div class="col m12 l12">
									<div class="col m10 l10">
										<i class="mdi-communication-messenger small"></i>
										<?php echo $consulta->cuerpo ?>
									</div>
									<?php 
										$respuesta_query = respuestaParaConsulta($consulta->id_consulta);
										if($_SESSION){
											if($_SESSION['id_usuario'] == $subasta->id_usuario && $respuesta_query->num_rows == 0){ ?>
											<div class="col m2 l2">	
												<a class="responder right" href="" data-idConsulta="<?php echo $consulta->id_consulta ?>">
													<i class="mdi-content-reply right small"></i>
												</a>
											</div>	
									<?php } }?>
								</div>
							</div>
							
							<div class="input-field col s12 m12 l12">
								<?php  
									$respuesta = $respuesta_query->fetch_object(); 
									if($respuesta_query->num_rows == 1){ ?>
										
										<div class="collection-item dialogo respuesta z-depth-2"><i class="mdi-communication-messenger small"></i><?php echo $respuesta->cuerpo ?></div>
									<?php } ?>
							</div>

							<?php if($_SESSION){ if($subasta->id_usuario == $_SESSION['id_usuario'] && $respuesta_query->num_rows == 0) { ?>
							<div class="wrapper" id="respuesta-form-<?php echo $consulta->id_consulta ?>">
								<form class="respuesta-form" method="post" action="/function/responder-process.php">
									<textarea name="cuerpo" id="cuerpo-respuesta" class="materialize-textarea validate active center z-depth-2" placeholder="Escriba aquí su respuesta..." required></textarea>
									<input type="hidden" name="id_consulta" value="<?php echo $consulta->id_consulta ?>">
									<input type="hidden" name="id_subasta" value="<?php echo $_GET['id_subasta']?>">
									<input id="respuesta-submit" type="submit" class="btn right form-submit" value="Responder">
								</form>	
							</div>
							<?php } } ?>
						</li>

					<?php } ?>
				</ul>

				<?php if(empty($_SESSION) || ($_SESSION && $subasta->id_usuario != $_SESSION['id_usuario'])) { ?>
					<form id="consultar-form" method="post" action="/function/consultar-process.php">
						<div class="input-field col s12 m12 l12">
							<textarea name="consulta" id="cuerpo-consulta" class="materialize-textarea validate active center" placeholder="Escriba aquí su consulta..." required></textarea>
						</div>
						<input type="hidden" name="id_subasta" value="<?php echo $_GET['id_subasta'] ?>">
						<input id="consulta-submit" type="submit" class="btn right form-submit" value="Consultar">
					</form>
				<?php } ?>
			</div>
		</section>	
	<?php 	} ?>		
</div>


<?php include('include/footer.php'); ?>