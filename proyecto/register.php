<?php 
error_reporting(-1);
ini_set('display_errors', 'On');
$pageTitle = "Bestnid | Registrarme";
include('include/header.php');

if(!empty($_POST)) {
	include('db/connect.php');
	var_dump($_POST);

	if(isset($_POST['nombre'], $_POST['apellido'],
	 $_POST['nombre_usuario'] , $_POST['dni'], $_POST['contraseña'])) {

		$nombre = trim($_POST['nombre']);
		$apellido = trim($_POST['apellido']);
		$nombre_usuario = trim($_POST['nombre_usuario']);
		$dni = trim($_POST['dni']);
		$contraseña = trim($_POST['contraseña']);

		if(!empty($nombre) && !empty($apellido) &&
		   !empty($nombre_usuario) && !empty($dni) && 
		   !empty($contraseña)) {
			
			$query = 	"INSERT INTO Usuario (dni, nombre_usuario, contraseña, nombre, apellido, fecha_alta)
						VALUES (?, ?, ?, ?, ?, NOW())";

			if(!$insert = $db->prepare($query)) {
				echo "<br>Bardeo el insert<br>";
			}
			var_dump($query);
			var_dump($insert);

			$insert->bind_param('issss', $dni, $nombre_usuario, $contraseña, $nombre, $apellido);

			if($insert->execute()) {
				header('Location: index.php');
				die();
			}
			
		}
	} else {
		echo "No llenaste todos los formularios.";
	}
}

?>

<section class="form">
	<div class="container">
		<div class="row">
			<header>
				<h4>Registrarme</h4>
				<p>Complete los siguientes campos para completar el registro.</p>
			</header>
		</div>
		<div class="row">
			<form action="" method="post">
				<div class="row">
			        <div class="input-field col s12">
			          	<input name="nombre" id="nombre" type="text">
	          			<label for="nombre">Nombre</label>
			        </div>
	     		</div>
	     		<div class="row">
			        <div class="input-field col s12">
			          	<input name="apellido" id="apellido" type="text" class="validate">
	          			<label for="apellido">Apellido</label>
			        </div>
	     		</div>
	     		<div class="row">
			        <div class="input-field col s12">
			          <input name="dni" id="dni" type="text" class="validate">
	          			<label for="dni">DNI (Documento Nacional de Identidad</label>
			        </div>
	     		</div>
	     		<div class="row">
			        <div class="input-field col s12">
			          	<input name="nombre_usuario" id="nombre_usuario" type="text" class="validate">
	          			<label for="nombre_usuario">Username</label>
			        </div>
	     		</div>
	     		<div class="row">
			        <div class="input-field col s12">
			          	<input name="contraseña" id="contraseña" type="password" class="validate">
	          			<label for="contraseña">Password</label>
			        </div>
	     		</div>
	     		<button class="btn waves-effect waves-light" type="submit" name="action">Submit
    				<i class="mdi-content-send right"></i>
  				</button>
			</form>
		</div>
	</div>
</section>


<?php include('include/footer.php') ?>