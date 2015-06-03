<?php 
error_reporting(-1);
ini_set('display_errors', 'On');
$pageTitle = "Bestnid | Registrarme";
include('include/header.php');

if(isset($_POST)){
	if(isset($_POST['nombre'], $_POST['apellido'], $_POST['dni'],$_POST['email'], $_POST['nombre_usuario'], $_POST['password'],$_POST['tarjeta'])){

		include('db/connect.php');

		$result = $db->query("SELECT * FROM Usuario WHERE nombre_usuario = '" . $_POST['nombre_usuario'] . "'");

		if($result->num_rows == 0) {

			$query = "INSERT INTO Usuario (id_usuario, dni, email, nombre_usuario, password, nombre, apellido, tarjeta, fecha_alta)
						VALUES (NULL, '" . $_POST['dni'] ."', '" . $_POST['email'] . "' ,'" . $_POST['nombre_usuario'] . "', '" . $_POST['password'] . "', '" . $_POST['nombre'] . "', '" . $_POST['apellido'] ."', '" . $_POST['tarjeta'] . "', CURRENT_DATE())";

			if($result = $db->query($query)) {
				header('Location: index.php');
			} else {
				echo "Error en el registro";
			}
		} else {
			// Usuario ya existe
		}
	} else {
		// Uno de los campos no fue llenado
	}
}

?>

<section class="register-form">
	<div class="container">
		<div class="row">
			<header class="form-header">
				<h4>Registrarme</h4>
				<p>Complete los siguientes campos para completar el registro.</p>
			</header>
		</div>
		<div class="row">
			<form action="" method="post" id="register-form">
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
			          	<input name="email" id="email" type="text" class="validate">
	          			<label for="email">E-mail</label>
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
			          	<input name="password" id="password" type="password" class="validate">
	          			<label for="password">Password</label>
			        </div>
	     		</div>
	     		<div class="row">
			        <div class="input-field col s12">
			          	<input name="valPass" id="valPass" type="password" class="validate">
	          			<label for="valPass">Repetir password</label>
			        </div>
	     		</div>
	     		<div class="row">
			        <div class="input-field col s12">
			          	<input name="tarjeta" id="tarjeta" type="text" class="validate">
	          			<label for="tarjeta">Num. tarjeta de credito</label>
			        </div>
	     		</div>

	     		<input id="register-submit" type="submit" class="btn right" value="Submit">
			</form>
			<div class="form-messages"></div>
		</div>
	</div>
</section>


<?php include('include/footer.php') ?>