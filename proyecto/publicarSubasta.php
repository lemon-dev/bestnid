<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Publicar subasta";
include('include/header.php');
 include("db/connect.php");



?>
<?php 
	$query= "SELECT * FROM categoria ";
	$result = $db->query($query);
 ?>

<?php if(isset($_GET['status'])){ ?>

	<?php if($_GET['status'] == 'fail') {?>

	<div class="container operation-result" id="crearSubasta-result">
		<div class="row">
			<h3>Ups :(</h3>
			<p>Ha habido un problema procesando su solicitud, por favor intente más tarde.</p>
			<a class="btn center" href="index.php">Inicio</a>
		</div>
	</div>

	<?php } else {?>
	
	<div class="container operation-result" id="crearSubasta-result">
		<div class="row">
			<h3>La subasta se ha creado con exito!</h3>
			<a class="btn center" href="subasta.php?id_subasta=<?php echo $_GET['id_subasta'] ?>">Ver subasta</a>

		</div>
	</div>

	<?php } ?>

<?php } else {?>

	
	<section class="form">
		<div class="container form-container">
			<div class="row">
				<header class="form-header">
					<h4>Publicar subasta</h4>
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
		          			<span id="subastaImagenUrl-hint" class="text-hint error">* Por favor ingrese una url valido (Formatos validos: jpeg, jpg, gif, png)</p>
				        </div>
		     		</div>
					<div class="row">
						<div class="input-field col s12">
						  <textarea id="subastaDesc" name="subastaDesc" class="materialize-textarea validate " required></textarea>
						  <label for="subastaDesc">Descripcion</label>
						</div>
					</div>
		     		<div class="row">		     			
		     		    <div class="range-field col s12">
		     		    	<label for="subastaFechafin">Duración de la subasta (entre 15 y 30 días)</label>
					    	<input type="range" name="subastaFechaFin" id="test5" min="15" max="30" />
					    </div> 
					</div>
		     		<input id="crearSubasta-submit" type="submit" class="btn right form-submit" value="Publicar"required>
				</form>
				<div class="form-messages"></div>
			</div>
		</div>
</section>

<?php } ?>

<?php include('include/footer.php') ?>