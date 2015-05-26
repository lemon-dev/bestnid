<?php 
	// La barra de navegación se modifica solo de aca
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $pageTitle; ?></title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand page-scroll" href="#page-top">
					<div>
						<img class="logo" src="img/logo/bestnid.png" alt="logo"> lemon-dev
					</div>
				</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Ingresar</a></li>
					<li><a href="/register.php">Registrarse</a></li>
				</ul>
				<form class="navbar-form navbar-right" role="search" method="get" action="/function/buscar_titulo.php">
					<div class="form-group">
						<input type="text" placeholder="Busque aquí..." value="" name="param_busqueda" class="form-control">
					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
				</form>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
