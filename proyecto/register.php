<?php 
	$pageTitle = "Registrarme";
	include("include/header.php");
?>

<?php include("db/connect.php"); ?>


<h1>Registrarme</h1>
<p>Complete los datos de la forma indicada para registrarse.</p>
<form action="" method="post">
	<table>
		<tr>
			<th>
				<label for="nombre">Nombre</label>
			</th>
			<td>
				<input type="text" name="nombre" id="nombre">
			</td>
		</tr>
		<tr>
			<th>
				<label for="apellido">Nombre</label>
			</th>
			<td>
				<input type="text" name="apellido" id="apellido">
			</td>
		</tr>
		<tr>
			<th>
				<label for="dni">DNI</label>
			</th>
			<td>
				<input type="text" name="dni" id="dni">
			</td>
		</tr>
		<tr>
			<th>
				<label for="contraseña">Contraseña</label>
			</th>
			<td>
				<input type="password" name="contraseña" id="contraseña" min="8" max="25">
			</td>
		</tr>
		<tr>
			<th>
				<label for="nombre_usuario">Nombre de Usuario</label>
			</th>
			<td>
				<input type="text" name="nombre_usuario" id="nombre_usuario">
			</td>
		</tr>
	</table>
	<input type="submit" value="Submit">
</form>

<?php include("include/footer.php"); ?>