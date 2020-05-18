<?php session_start(); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Configuracion</title>
	<script type="text/javascript" src="scriptConfiguracion.js"></script>
</head>
<body background= "Imagenes/2.jpg">
	<h3 class="tituloTerciarioConfiguracion">
		<?php if (!empty($_SESSION['error'])){
    		echo $_SESSION['error'];
			unset($_SESSION['error']);} ?> </h3>
	<div class="barraInicio">	
		<div class="divBotones"> 
		<a class="botonInicio" href="Home.php"> Inicio </a>
	    </div>
	    <div class="divBotones">
		<a class="botonInicio" href="miPerfil.php"> Perfil </a>
	    </div>
	    <div class="divBotones">
		<a class="botonInicio" href="Configuracion.php"> Configuracion </a>
	    </div>
		
	 </div>
	 <img class="imagenTitulo" src="Imagenes\Titulo.png">
			<h2 class="tituloSecundarioConfiguracion" >Configuración</h2>
			<h3 class="tituloTerciarioConfiguracion" >Modifique los datos que desee: </h3>
			<div class="divConfiguracion">
				<form action="configurarDatosSimples.php" method="post" enctype="multipart/form-data" onsubmit="return validar();">
				  <div class="registroConfiguracion">
					<label class="labelWhite">Cuenta: </label><br>
					<input type="E-mail" class="redondeado" autocomplete="on" id="cuenta" name="cuenta" value="<?php echo $_SESSION['usuario']['cuenta']; ?>"><br>
					<label class="labelWhite">Nombre: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="nombre" name="nombre" value="<?php echo $_SESSION['usuario']['nombre']; ?>"><br>
					<label class="labelWhite">Apellido: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="apellido" name="apellido" value="<?php echo $_SESSION['usuario']['apellido']; ?>"><br>
					<label class="labelWhite">Foto: </label><br>
					<input type="file" class= "boton" accept="jpg" id="unImagen" name="unImagen"><br>
					<input type="submit" class="boton" value="Guardar Cambios"><br>
				  </div>
			    </form>
			    <form action="configurarDatosComplejos.php" enctype="multipart/form-data" method="post" onsubmit="return validar2();">
				  <div class="registroConfiguracion">
					<label class="labelWhite">Ingrese la clave actual: </label><br>
					<input type="password" class="redondeado" id="unContraseña"  name="unContraseña"><br>
					<label class="labelWhite">Ingrese una nueva clave: </label><br>
					<input type="password" class="redondeado" id="unContraseña2" name="unContraseña2"><br>
					<label class="labelWhite">Repita la nueva clave: </label><br>
					<input type="password" class="redondeado" id="unContraseña3" name="unContraseña3"><br>
					<br>
					</div>
					<input type="submit" class="boton" value="Guardar Cambios"><br>
				</form>
				 <div class="registro">
					<h3 class="tituloSecundarioRegistro"> DATOS DE LA TARJETA </h3>
					<form action="verificadorNuevaCuenta.php" method="post" enctype="multipart/form-data" onsubmit="return validar();"><br>
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
					<input type="submit" class="boton" value="Guardar Cambios"><br>
					</form>
		   		</div>
		   	      
		   		
		    </div>
		</form>
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6</p>
    </div>
</body>
</html>