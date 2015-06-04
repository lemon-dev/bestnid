<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

$pageTitle = "Bestnid | Registrarme";
include('include/header.php');

?>

<div class="row" id="register-result"></div>

<section class="register-form">
	<div class="container">
		<div class="row">
			<header class="form-header">
				<h4>Registrarme</h4>
				<p>Complete los siguientes campos para completar el registro.</p>
			</header>
		</div>
		<div class="row">
			<form action="" method="post" id="function/register-form">
				<div class="row">
			        <div class="input-field col s12">
			          	<input name="nombre" id="nombre" type="text">
	          			<label for="nombre">Nombre</label>
			        </div>
	     		</div>
	     		<div class="row">
			        <div class="input-field col s12">
			          	<input name="apellido" id="apellido" type="text" class="validate" required>
	          			<label for="apellido">Apellido</label>
			        </div>
	     		</div>
	     		<div class="row">
			        <div class="input-field col s12">
			          <input name="dni" id="dni" type="number" class="validate" required>
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
	          			<label for="val_password">Password</label>
			        </div>
	     		</div>
	     		<div class="row">
			        <div class="input-field col s12">
			          	<input name="tarjeta" id="tarjeta" type="text" class="validate" required>
	          			<label for="tarjeta">Num. tarjeta de credito</label>
			        </div>
	     		</div>

	     		<input id="register-submit" type="submit" class="btn right" value="Submit"required>
			</form>
			<div class="form-messages"></div>
		</div>
	</div>
</section>


<?php include('include/footer.php') ?>