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
										<form action="function/ofertar-process.php" method="post">
											<div class="row">
												<div class="input-field col s12">
										          	<input name="precio" id="precio" type="number" class="validate" required>
								          			<label for="precio">Precio</label>
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
						
						<a class="waves-effect waves-light btn disabled">Ver Ofertas</a>

					<?php } ?>
				</div>
			</li>
		</ul>
		<ul class="collapsible popout" data-collapsible="accordion">
			<li>
				<div class="collapsible-header"><i class="mdi-communication-messenger"></i>First</div>
				<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
			</li>
			<li>
				<div class="collapsible-header"><i class="mdi-communication-messenger"></i>Second</div>
				<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
			</li>
			<li>
				<div class="collapsible-header"><i class="mdi-communication-messenger"></i>Third</div>
				<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
			</li>
		</ul>
	</div>
</section>


<?php include('include/footer.php'); ?>