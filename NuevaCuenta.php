<?php
	session_start();

	if (!empty($_SESSION['error'])) {
		echo "<font color=white size='5pt'>" . $_SESSION['error'] . "</font>";
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
		$actual = date('Y-m-d');
	?>
</head>
<body background="Imagenes/2.jpg">
	<div>
			<img src="Imagenes/Titulo.png" class="imagenTituloRegistro">
			<h3 class="tituloSecundarioRegistro">A CONTINUACION INGRESE SUS DATOS:</h3>
			<div class="divRegistro">
				<div class="registro">
					<h3 class="tituloSecundarioRegistro"> DATOS PERSONALES </h3>
				<form action="verificadorNuevaCuenta.php" method="post" enctype="multipart/form-data" onsubmit="return validar();">
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
				<div class="registro">
				<h3 class="tituloSecundarioRegistro"> DATOS DE LA TARJETA </h3>
				<label class="labelWhite">Nombre: </label><br>
				<input type="text" class="redondeado" id="unNombreTar" name="unNombreTar"><br>
				<label class="labelWhite">Apellido: </label><br>
				<input type="text" class="redondeado" id="unApellidoTar" name="unApellidoTar"><br>
				<label class="labelWhite">N° de Tarjeta: </label><br>
				<input type="text" maxlength="16" class="redondeado" id="unN°Tarjeta" name="unN°Tarjeta"><br>
				<label class="labelWhite">Codigo de Seguridad: </label><br>
				<input type="text" maxlength="3" class="redondeado" id="unCodigo" name="unCodigo" > <br>
				<label class="labelWhite">Fecha de Expiracion: </label><br>
				<input type="text" maxlength="10"class="redondeado" id="unVencimiento" name="unVencimiento" placeholder="aaaa-mm-dd"> <br>	
				<input type="submit"class="boton" value="Ingresar"><br>
				</form>  
				
		   		</div>
				   
				   
		   	</div>
			   
    </div>
	
</body>
</html>