<?php 
$pageTitle = "Bestnid | Login";
include("include/header.php");
include("db/connect.php");


if(isset($_POST)){

	if(isset($_POST['nombre_usuario'], $_POST['contraseña'])) {
		
		$nombre_usuario = trim($_POST['nombre_usuario']);
		$contraseña = trim($_POST['contraseña']);


		require_once("db/user_exists.php");

		if (user_exists($nombre_usuario,$contraseña)) {
		 
			session_start();

			$_SESSION['nombre_usuario'] = $nombre_usuario;
			header('Location: index.php');
			die();
		}else{
			echo "Usuario o contraseña no valido";
			//header('Location: login.php');
		}
	}
}

?>

<section class="login-form">
	<header>	
		
	</header>
	<div class="container">
		<div class="row">
			<header class="form-header">
				<h4>Iniciar Sesi&oacute;n</h4>
			</header>
		</div>
		<div class="row">
			<form action="" method="post">
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

<?php include("include/footer.php");?>