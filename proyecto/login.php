<?php 

$pageTitle = "Bestnid | Login";
include("include/header.php");
include("db/connect.php");

?>

<span id="user-exists"></span>

<section class="login-form">
	<div class="container form-container">
		<div class="row">
			<header class="form-header">
				<h4>Iniciar Sesi&oacute;n</h4>
			</header>
		</div>
		<div class="row">
			<form action="function/login-process.php" method="post" id="login-form">
				<div class="row">
			        <div class="input-field col s12">
			          	<input name="usuario" id="usuario" type="text" class="validate">
	          			<label for="usuario">Username</label>
			        	<span id="name-hint">Nombre de usuario incorrecto</span>
			        </div>
	     		</div>
	     		<div class="row">
			        <div class="input-field col s12">
			          	<input name="password" id="password" type="password" class="validate">
	          			<label for="password">Password</label>
	          			<span id="log-pass-hint">Por favor ingrese una contraseña</span>
			        </div>
	     		</div>
	     		<input type="submit" class="btn right form-submit" value="Submit" id="login-submit">
			</form>
		</div>
	</div>
</section>

<?php include("include/footer.php");?>