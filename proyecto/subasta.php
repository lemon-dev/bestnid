<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

include('db/connect.php');

if(isset($_GET['id_subasta'])){
	
	$query = "	SELECT 	*
				FROM	subasta S INNER JOIN producto P ON S.id_producto = P.id_producto
								  INNER JOIN categoria C ON P.id_categoria = C.id_categoria
				WHERE	S.id_subasta = " . $_GET['id_subasta'];

	$result = $db->query($query);

	$row = $result->fetch_object();


}

$pageTitle = "Bestnid | $row->titulo";
include('include/header.php');

?>

<section>
	<div class="container ver-subasta z-depth-2 col m12">
		<header class="row center">
			<h3><?php echo $row->titulo ?></h3>
		</header>
		<ul class="row">
			<li class="col s12 m6 l6">
				<img class="responsive-img" src="<?php echo $row->imagen_url ?>" alt="Imagen">
			</li>
			<li class="col s12 m6 l6">
				<div class="subasta-opciones">
					<p class="descripcion"><?php echo $row->descripcion ?></p>
					<p>Categoria : <?php echo $row->nombre ?></p>
					<p>Fecha de Inicio: <?php echo $row->fecha_inicio ?></p>
					<p>Fecha de Fin: <?php echo $row->fecha_final ?></p>
					<?php if($_SESSION){ ?>
						
						<?php if($row->id_usuario != $_SESSION['id_usuario']) {  ?>

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
						<?php } else { ?>
								<a class="waves-effect waves-light btn">Ver Ofertas</a>
						<?php } ?>
					
					<?php } else { ?>
						
						<a class="waves-effect waves-light btn disabled">Ofertar</a>
						<span class="not-registered warning"> * Haga <a href="/login.php?redirect_to=<?php echo $_GET['id_subasta'] ?>">click aquí</a> para iniciar sesión y poder Ofertar.</span>

					<?php } ?>
				</div>
			</li>
		</ul>
		<div class="container consultas">
				<?php 

				require_once('db/connect.php');

				$query = " SELECT * FROM consulta WHERE id_subasta=" .  $_GET['id_subasta'];

				if(!$result = $db->query($query)){
					echo ':(';
					die();
				}

				if($result->num_rows > 0){
					echo '<ul class="collapsible" data-collapsible="accordion">';
				}

				while ($row = $result->fetch_object()){ ?>
					

					<li>
						<div class="collapsible-header consulta"><i class="mdi-communication-messenger"></i><?php echo $row->cuerpo ?></div>
						<div class="collapsible-body"><p>Respuesta</p></div>
					</li>

				<?php } ?>
			</ul>
			<div class="container consultar-form-container">
			<form id="consultar-form" method="post" action="/function/consultar-process.php">
				<div class="input-field col s12 m12 l12">
					<textarea name="consulta" id="consulta" class="materialize-textarea validate active center" placeholder="Escriba aquí su consulta..." required></textarea>
				</div>
				<input type="hidden" name="id_subasta" value="<?php echo $_GET['id_subasta'] ?>">
				<input id="consulta-submit" type="submit" class="btn right form-submit" value="Ofertar">
			</form>
		</div>	
	</div>
</section>


<?php include('include/footer.php'); ?>