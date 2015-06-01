<?php 
$pageTitle = "Bestnid | Login";
include("include/header.php");
?>

<section class="login-form">
	<header>	
		
	</header>
	<div class="container">
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
	     		<input type="submit" class="btn" value="Submit">
			</form>
		</div>
	</div>
</section>

<?php include("include/footer.php");?>