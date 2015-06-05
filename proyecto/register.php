<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Registrarme";
include('include/header.php');
?>

<?php if(isset($_GET['status'])){ ?>

	<?php if($_GET['status'] == 'fail') {?>

	<div class="container" id="register-result">
		<div class="row">
			<h3>Ups :(</h3>
			<p>Ha habido un problema procesando su solicitud, por favor intente más tarde.</p>
			<a class="btn center red" href="index.php">Inicio</a>
		</div>
	</div>

	<?php } else {?>
	
	<div class="container" id="register-result">
		<div class="row">
			<h3>Se ha registrado con exito!</h3>
			<p>Inicie sesión para poder disfrutar completamente de nuestro sitio</p>
			<a class="btn center red" href="login.php">Iniciar Sesi&oacute;n</a>
		</div>
	</div>

	<?php } ?>

<?php } else {?>
	
	<section class="register-form">
		<div class="container form-container">
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
				          	<input name="nombre" id="nombre" type="text" required>
		          			<label for="nombre">Nombre</label>
				        </div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          	<input name="apellido" id="apellido" type="text" required>
		          			<label for="apellido">Apellido</label>
				        </div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          <input name="dni" id="dni" type="number" class="validate" min="1000000"required>
		          			<label for="dni">DNI (Documento Nacional de Identidad</label>
				        </div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          	<input name="email" id="email" type="email" class="validate" placeholder="Ejemplo: micuenta@mimail.com" required>
		          			<label for="email">E-mail</label>
				        </div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          	<input name="nombre_usuario" id="nombre_usuario" type="text" class="validate" required>
		          			<label for="nombre_usuario">Username</label>
				        	<span id="user-hint">El nombre de usuario ya existe.</span>
				        </div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          	<input name="password" id="password" type="password" class="validate" required>
		          			<label for="password">Password</label>
				        </div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          	<input name="val_password" id="val_password" type="password" class="validate" required>
		          			<label for="val_password">Confirmación de contraseña</label>
		          			<span id="pass-hint">Por favor confirme su contraseña</span>
				        </div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          	<input name="tarjeta" id="tarjeta" type="text" class="validate" required>
		          			<label for="tarjeta">Num. tarjeta de credito</label>
				        </div>
		     		</div>

		     		<input id="register-submit" type="submit" class="btn right form-submit" value="Submit"required>
				</form>
				<div class="form-messages"></div>
			</div>
		</div>
<<<<<<< HEAD
	</section>

<?php } ?>
=======
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
>>>>>>> 696ed09a0755423da42c376de4b4cb9be3703fcc



<?php include('include/footer.php') ?>