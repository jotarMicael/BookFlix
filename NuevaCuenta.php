<?php
	session_start();

	if (!empty($_SESSION['error'])) {
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	}
?>
<!DOCTYPE html>
<html>
<head >
	<title>Crear Cuenta en BF</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg"> 
	<script type="text/javascript" src="scriptRegistro.js"></script>
	<?php
		include('conexion.php');
		$link = conectar();
	?>
</head>
<body background="Imagenes/2.jpg">
	<div>
		<form action="verificadorNuevaCuenta.php" method="post" enctype="multipart/form-data" onsubmit="return validar();">
			<img src="Imagenes/Titulo.png" class="imagenTituloRegistro">Bienvenido a BookFlix</h2>
			<h3 class="tituloSecundarioRegistro">A continuacion ingrese sus datos:</h3>
			<div class="registro">
				<label class="labelWhite">E-mail: </label><br>
				<input type="E-mail" class="redondeado" id="unEmail" name="unEmail"><br>
				<label class="labelWhite">Nombre: </label><br>
				<input type="text" class="redondeado" id="unNombre" name="unNombre"><br>
				<label class="labelWhite">Apellido: </label><br>
				<input type="text" class="redondeado" id="unApellido" name="unApellido"><br>
				<label class="labelWhite">Nombre de Usuario: </label><br>
				<input type="text" class="redondeado" id="unUsuario" name="unUsuario"><br>
				<label class="labelWhite">Ingrese una clave: </label><br>
				<input type="password" class="redondeado" id="unContraseña" name="unContraseña"><br>
				<label class="labelWhite">Vuelva a ingresar la clave: </label><br>
				<input type="password" class="redondeado" id="unContraseña2" name="unContraseña2"><br>
				
		    </div>
		</form>
		<form action="verificadorNuevaCuenta.php" method="post" enctype="multipart/form-data" onsubmit="return validar();">
			<div class="registro">
				<h1 class="tituloSecundarioRegistro"> Datos de la Tarjeta </h2> <br>
				<label class="labelWhite">Nombre: </label><br>
				<input type="text" class="redondeado" id="unNombre" name="unNombre"><br>
				<label class="labelWhite">Apellido: </label><br>
				<input type="text" class="redondeado" id="unApellido" name="unApellido"><br>
				<label class="labelWhite">N° de Tarjeta: </label><br>
				<input type="text" maxlength="16" class="redondeado" id="unN°Tarjeta" name="unN°Tarjeta"><br>
				<label class="labelWhite">Codigo de Seguridad: </label><br>
				<input type="text" maxlength="3" class="redondeado" id="unCodigo" name="unCodigo" > <br>
				<label class="labelWhite">Fecha de Expiracion: </label><br>
				<input type="text" maxlength="5" class="redondeado" id="unVencimiento" name="unVencimiento"> <br>	
				<input type="submit"class="boton" value="Ingresar"><br>
		    </div>
		    </div>
		</form>
</body>
</html>