<?php session_start(); 

include('conexion.php');

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
		<a class="botonInicio" href="Home.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Inicio </a>
	    </div>
	    <div class="divBotones">
		<a class="botonInicio" href="deletePerfil.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Eliminar Perfiles </a>
	    </div>
		<div class="divBotones">
		<form action="deleteAccount.php" method="post" enctype="multipart/form-data" onclick="return confirm();">
			<input type="submit" class="boton" value="Eliminar Cuenta"><br>
		</form>
	    </div>
	    <div class="divBotones">
		<a class="botonInicio" href="Configuracion.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Configuracion </a>
	    </div>
		
	 </div>
	 <img class="imagenTitulo" src="Imagenes\Titulo.png">
			<h2 class="tituloSecundarioConfiguracion" >Configuración</h2>
			<h3 class="tituloTerciarioConfiguracion" >Modifique los datos que desee: </h3>
			<div class="divConfiguracion">
				<form action="configurarDatosSimples.php" method="post" enctype="multipart/form-data" onsubmit="return validar();">
				  <div class="registroConfiguracion">
					<label class="labelWhite">Cuenta: </label><br>
					<input type="E-mail" class="redondeado" autocomplete="on" id="cuenta" name="cuenta" value="<?php echo $_SESSION['usuario']['nombre_Usuario']; ?>"><br>
					<label class="labelWhite">Nombre: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="nombre" name="nombre" value="<?php echo $_SESSION['usuario']['nombre']; ?>"><br>
					<label class="labelWhite">Apellido: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="apellido" name="apellido" value="<?php echo $_SESSION['usuario']['apellido']; ?>"><br>
					<label class="labelWhite">Imagen del perfil: </label><br>
					<br>
					<input type="file" accept="jpg" id="unImagen" name="unImagen"><br>
					<br>
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
					<input type="submit" class="boton" value="Guardar Cambios"><br>
					</div>
				</form>
				 <div class="registro">
					<h3 class="tituloSecundarioRegistro"> DATOS DE LA TARJETA </h3>
					<form action="Configuracion.php" method="post" enctype="multipart/form-data"><br>
					<label class="labelWhite">Nombre: </label><br>
					<input type="text" class="redondeado" id="unNombreTar" name="unNombreTar"><br>
					<label class="labelWhite">Apellido: </label><br>
					<input type="text" class="redondeado" id="unApellidoTar" name="unApellidoTar"><br>
					<label class="labelWhite">N° de Tarjeta: </label><br>
					<input type="text" maxlength="16" class="redondeado" id="unN°Tarjeta" name="unN°Tarjeta"><br>
					<label class="labelWhite">Codigo de Seguridad: </label><br>
					<input type="text" maxlength="3" class="redondeado" id="unCodigo" name="unCodigo" > <br>
					<label class="labelWhite">Fecha de Expiracion: </label><br>
					<input type="text" maxlength="5" class="redondeado" id="unVencimiento" name="unVencimiento"> <br>	
					<input type="submit" class="boton" value="Guardar Cambios"><br>
					</form>
		   		</div>
				   <?php
				   				   		if (isset($_POST['unN°Tarjeta'])&&isset($_POST['unNombreTar'])&&isset($_POST['unApellidoTar'])&&isset($_POST['unCodigo'])&&isset($_POST['unVencimiento'])){
											$consulta = "UPDATE cuentausuario SET numero_Tarjeta = '" . $_POST['unN°Tarjeta']. "', codigo_Seguridad = '" . $_POST['unCodigo']. "', nombre_Tarjeta='" . $_POST['unNombreTar']. "' , apellido_Tarjeta= '" . $_POST['unApellidoTar']. "' WHERE nombre_Usuario = '" . $_SESSION['usuario']['nombre_Usuario'] . "' ";
				   
											mysqli_query($conexion, $consulta);
				   
											echo"Datos de la tarjeta modificados correctamente";
											
											  }
										   else{
											   echo "Todos los campos de la tarjeta deben estar completos";
										   }
										  
									
				 ?>
				 
		   	      
		   		
		    </div>
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>