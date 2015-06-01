<?php 
error_reporting(-1);
ini_set('display_errors', 'On');
$pageTitle = "Bestnid | Registrarme";
include('include/header.php');

if(!empty($_POST)) {
	include('db/connect.php');

	if(isset($_POST['nombre'], $_POST['apellido'],
	 $_POST['nombre_usuario'] , $_POST['dni'], $_POST['contraseña'])) {

		$nombre = trim($_POST['nombre']);

		//Verificar si ya existe un usuario con el nombre

		$apellido = trim($_POST['apellido']);
		$nombre_usuario = trim($_POST['nombre_usuario']);
		$dni = trim($_POST['dni']);
		$contraseña = trim($_POST['contraseña']);

		include('db/user_exists.php');

		if(user_exists($nombre_usuario)){
			echo "El usuario ya existe";
		} else {

			if(!empty($nombre) && !empty($apellido) &&
			   !empty($nombre_usuario) && !empty($dni) && 
			   !empty($contraseña)) {
				
				$query = 	"INSERT INTO Usuario (dni, nombre_usuario, contraseña, nombre, apellido, fecha_alta)
							VALUES (?, ?, ?, ?, ?, NOW())";

				if($insert = $db->prepare($query)) {
					echo "<br>Bardeo el insert<br>";
				}
				
				echo "Query: " . var_dump($query);

				$insert->bind_param('issss', $dni, $nombre_usuario, $contraseña, $nombre, $apellido);

				if($insert->execute()) {
					$insert->close();
					$db->close();
					header('Location: index.php');
					die();
				}
			}
		}
	} else {
		echo "No llenaste todos los campos.";
	}
}

?>

<section class="form">
	<div class="container">
		<div class="row">
			<header class="form-header">
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
	     		<input type="submit" class="btn right" value="Submit">
			</form>
		</div>
	</div>
</section>


<?php include('include/footer.php') ?>