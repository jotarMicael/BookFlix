<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>BookFlix</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg"> 
	<script type="text/javascript" src="scriptIndex.js"></script>
	<?php 
		include("conexion.php");
		if (!empty($_SESSION['error'])) {
			echo "<font color=white  size='5pt'> '".$_SESSION['error']."' </font>";
			unset($_SESSION['error']);
		}
	?>
</head>
<body background="Imagenes\2.jpg" >
<img class="imagenTitulo" src="Imagenes\Titulo.png">
		<form action="verificadorLogin.php" method="post" id="formularioIndex" onsubmit="return validar();">
			<h2 class="tituloSecundarioIndex">Iniciar Sesion</h2>
			<br>
			<br>
			<div class="login">
				<label class="labelWhite">Cuenta: </label>
				<input type="text" class="redondeado" autocomplete="on" id="nickname" name="nickname">
				<label class="labelWhite">Contraseña: </label>
				<input type="password" class="redondeado" id="contraseña" name="contraseña">
				<input type="submit" class="boton" id="botonIngreso" value="Ingresar">
		    </div>
		</form>
		<form action = "indexAdmin.php">
			<br>
			<br>
			<label class="tituloCrearCuentaIndex" style="top: -1" >¿Eres administrador? </label>
			<input type="submit" class="boton" value="Ingresar">
	    </form>
		</div>
		<div class="margenI"></div>
		<div class="margenD"></div>
		<form action = "NuevaCuenta.php" id="formularioNuevaCuenta">
			<br>
			<br>
			<label class="tituloCrearCuentaIndex" style="top: -1" >¿No tienes cuenta? </label>
			<input type="submit" class="boton" value="Registrarse">
	    </form>
		<div class="divBotones">
	    <div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    	</div>
</body>
</html>