<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Crear subasta";
include('include/header.php');
 include("db/connect.php");



?>
<?php 
	$query= "SELECT * FROM categoria ";
	$result = $db->query($query);
 ?>

<?php if(isset($_GET['status'])){ ?>

	<?php if($_GET['status'] == 'fail') {?>

	<div class="container" id="crearSubasta-result">
		<div class="row">
			<h3>Ups :(</h3>
			<p>Ha habido un problema procesando su solicitud, por favor intente más tarde.</p>
			<a class="btn center" href="index.php">Inicio</a>
		</div>
	</div>

	<?php } else {?>
	
	<div class="container" id="crearSubasta-result">
		<div class="row">
			<h3>Se ha creado la subasta con exito!</h3>
			<a class="btn center" href="index.php">Inicio</a>

		</div>
	</div>

	<?php } ?>

<?php } else {?>

	
	<section class="form">
		<div class="container form-container">
			<div class="row">
				<header class="form-header">
					<h4>Crear subasta</h4>
					<p>Complete los siguientes campos para crear una subasta.</p>
					
				</header>
			</div>
			<div class="row">
				<form action="" method="post" id="subasta-form">
					<div class="row">
				        <div class="input-field col s12">
				          	<input name="subastaTitulo" id="subastaTitulo" type="text" class="validate" required>
		          			<label for="subastaTitulo">Titulo</label>
				        </div>
		     		</div>
		     		<div class= "row">
		     			<div class="input-field col s12">
		     				<select name="subastaCategorias" id="subastaCategorias">
							<?php 
								while ($row = $result->fetch_object()) { ?>
								<option value="<?php echo $row->id_categoria ?>"><?php echo $row->nombre ?></option>
							<?php } ?>
							</select>
						</div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          	<input name="subastaImagenUrl" id="subastaImagenUrl" type="text" class="validate" required>
		          			<label for="subastaImagenUrl">Url de la imagen</label>
				        </div>
		     		</div>
					<div class="row">
						<div class="input-field col s12">
						  <textarea id="subastaDesc" name="subastaDesc" class="materialize-textarea validate " required></textarea>
						  <label for="subastaDesc">Descripcion</label>
						</div>
					</div>
		     		<div class="row">
		     			<label for="subastaFechafin">Fecha de finalizacion de la subasta</label>
				        <div class="input-field col s12">
				          	<input name="subastaFechaFin" type="date" class="validate  ">
				        </div>
		     		</div>
		     		<input id="crearSubasta-submit" type="submit" class="btn right form-submit" value="Submit"required>
				</form>
				<div class="form-messages"></div>
			</div>
		</div>
</section>

<?php } ?>

<?php include('include/footer.php') ?>