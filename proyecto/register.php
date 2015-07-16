<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Registrarme";
include('include/header.php');
?>

<?php if(isset($_GET['status'])){ ?>

	<?php if($_GET['status'] == 'fail') {?>

	<div class="container operation-result" id="register-result">
		<div class="row">
			<h3>Ups :(</h3>
			<p>Ha habido un problema procesando su solicitud, por favor intente más tarde.</p>
			<a class="btn center" href="index.php">Inicio</a>
		</div>
	</div>

	<?php } else {?>
	
	<div class="container operation-result" id="register-result">
		<div class="row">
			<h3>Se ha registrado con exito!</h3>
			<p>Inicie sesión para poder disfrutar completamente de nuestro sitio</p>
			<a class="btn center" href="login.php">Iniciar Sesi&oacute;n</a>
		</div>
	</div>

	<?php } ?>

<?php } else {?>
	
	<section class="form">
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
				          	<input name="nombre" id="nombre" type="text" class="validate" required>
		          			<label for="nombre">Nombre</label>
		          			<span id="name-hint" class="text-hint warning">* El nombre solo puede contener letras, caracteres invalidos han sido omitidos.<span>
				        </div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          	<input name="apellido" id="apellido" type="text" class="validate" required>
		          			<label for="apellido">Apellido</label>
		          			<span id="lastname-hint" class="text-hint warning">*El apellido solo puede contener letras, caracteres invalidos han sido omitidos<span>
				        </div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          <input name="dni" id="dni" type="text" class="validate active" placeholder="Ejemplo: xx.xxx.xxx"  required>
		          			<label for="dni">DNI (Documento Nacional de Identidad)</label>
				        	<span id="dni-hint" class="text-hint warning">* El dni solo puede contener numeros,caracteres invalidos han sido omitidos</span>
				        </div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          	<input name="email" id="email" type="email" class="validate active" placeholder="Ejemplo: micuenta@mimail.com" required>
		          			<label for="email">E-mail</label>
				        </div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          	<input name="nombre_usuario" id="nombre_usuario" type="text" class="validate" required>
		          			<label for="nombre_usuario">Username</label>
		          			<span id="user-hint" class="text-hint error">* El nombre de usuario ya existe</span>
				        	
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
		          			<span id="pass-hint" class="text-hint error">* Las contraseñas no coinciden, por favor vuelva a intentarlo</span>
				        </div>
		     		</div>
		     		<div class="row">
				        <div class="input-field col s12">
				          	<input name="tarjeta" id="tarjeta" type="text" class="validate" placeholder="Ejemplo: xxxx xxxx xxxx" required maxlength="11">
		          			<label for="tarjeta">Num. tarjeta de credito</label>
		          			<span id="tarjeta-hint" class="text-hint warning">* El num. de la tarjeta solo puede contener numeros,caracteres invalidos han sido omitidos</span>
				        </div>
		     		</div>

		     		<input id="register-submit" type="submit" class="btn right form-submit" value="Registrarme">
				</form>
				<div class="form-messages"></div>
			</div>
		</div>
</section>

<?php } ?>

<?php include('include/footer.php') ?>