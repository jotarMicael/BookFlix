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
	<title>Perfiles</title>
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
			<img src="Imagenes/Titulo.png" class="imagenTituloRegistro">
			<h3 class="tituloSecundarioRegistro">Perfiles</h3>
			<div class="divRegistro">
				<div class="registro">
					<h3 class="tituloSecundarioRegistro"> Crear Perfil </h3>
				<form action="verificadorNuevaCuenta.php" method="post" enctype="multipart/form-data" onsubmit="return validar();">
				<label class="labelWhite">Nombre: </label><br>
				<input type="text" class="redondeado" id="unNombre" name="unNombre"><br>
			  	</form>
		    	</div>
				<div class="registro">
				<h3 class="tituloSecundarioRegistro"> Perfiles creados </h3>
				<!--<form action="verificadorNuevaCuenta.php" method="post" enctype="multipart/form-data" onsubmit="return validar();"><br>
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
				</form>-->
		   		</div>
		   	</div>
    </div>
    <div class="divRegistro">
    			<input type="submit"class="boton" value="Ingresar"><br>
    </div>
</body>
</html>