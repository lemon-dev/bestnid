<?php 
	session_start();
	//var_dump($_SESSION);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<title><?php echo $pageTitle; ?></title>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/materialize.min.css">
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<div class="navbar-fixed">
		<nav class="red darken-1">
			<div class="nav-wrapper">
				<div>
					<a href="/index.php" class="brand-logo">
						<img src="/img/logo.png" class="circle responsive-img" alt="Logo">
					</a>
				</div>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<ul class="right hide-on-med-and-down">	
				
				<?php 
				if($_SESSION){ ?>
					<li><a href="/publicarSubasta.php">Publicar Subasta</a></li>
					<li><a href="/verPerfil.php">Ver Perfil</a></li>	
					<li><a href="/logout.php">Cerrar Sesi&oacute;n</a></li>


				<?php } else { ?>

					<li><a href="/register.php">Registrarse</a></li>
					<li><a href="/login.php">Iniciar Sesi&oacute;n</a></li>
					
				
				<?php } ?>
				<!--seccion para mobiles-->
				</ul>
				<ul class="side-nav" id="mobile-demo">
							<?php
							if($_SESSION){ ?>
								   	<li><a href="/publicarSubasta.php">Publicar Subasta</a></li>
									<li><a href="/verPerfil.php">Ver Perfil</a></li>    
									<li><a href="/logout.php">Cerrar Sesi&oacute;n</a></li>
	 
							<?php } else { ?>
	 
									<li><a href="/register.php">Registrarse</a></li>
									<li><a href="/login.php">Iniciar Sesi&oacute;n</a></li>
								   
						   
							<?php } ?>
				</ul>
			</div>
		</nav>
	</div>