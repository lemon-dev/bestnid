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
	<nav>
		<ul>
			<li><img src="#" alt="logo"></li>
			<li><a href="#">Bestnid</a></li>
			<li>
				<form method="get" action="/function/buscar_titulo.php">
					<input type="text" placeholder="Search" value="" name="param_busqueda">
					<button type="submit">Buscar</button>
				</form>
			</li>	
			<li><a href="/register.php">Registrarse</a></li>
			<li><a href="#">Loguearse</a></li>
		</ul>
	</nav>
