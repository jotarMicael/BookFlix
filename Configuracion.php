<?php session_start(); 

include('conexion.php');
if (!empty($_SESSION['error'])) {
	echo "<font color=white  size='5pt'> ".$_SESSION['error']." </font>";
	unset($_SESSION['error']);
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Configuracion</title>
	<script type="text/javascript" src="scriptConfiguracion.js"></script>
	<style>
		body{background-color: #4642B8;padding: 15px;font-family: Arial;}
		
		#menu{
			background-color: #000;
			position: relative;
		
		}

		#menu ul{
			list-style: none;
			margin: 0;
			padding: 0;
		}

		#menu ul li{
			display: flex;
		}

		#menu ul li a{
			color: white;
			display: block;
			padding: 10px 5px;
			text-decoration: none;
		}

		#menu ul li a:hover{
			background-color: #42B881;
		}

		.item-r{
			float: right;
		}

		.nav li ul {
			display:none;
			position:absolute;
			min-width:140px;

		}
		.nav li:hover > ul{

			display:block;
		}
		.nav li ul li{
			position:absolute;
		}
		.nav li ul li ul{
			position:absolute;
			right: -140px;
			top: 0px;
		}
	</style>
</head>
<body background= "Imagenes/2.jpg">
	<div id="menu" class="barraInicio">
			<div class="divBotones">
			<li><a href="Home.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>" class="botonInicio">Inicio</a></li>
			</div>
			<div class="divBotones">
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>
			<li><a class="botonInicio" href="miPerfil.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Mi Perfil</a></li>
			<?php }?>
		    </div>
		    <div class="divBotones">
		    	<img class="imagenBarraSuperior" src="Imagenes\TituloBarraSuperior.png">
		    </div>
			<div class="divBotones">
			<form action="Busqueda.php" method="POST" enctype="multipart/form-data">
		<div style="display: flex;">
			<div>
			<label class="labelWhite">Autor/es: </label><br>
					<select name="nombreCompletoAutor" id="nombreCompletoAutor">
					<option value="Todos">Todos</option>
						<?php 
							$sql= "SELECT nombre,apellido FROM autor";
							$result=mysqli_query($conexion,$sql);
							if( mysqli_num_rows($result) == 0 )
								echo " No hay ningun autor creado";
							else {
							
							while($mostrar=mysqli_fetch_array($result)){
						?>
						
						<option> <?php echo  $mostrar ['nombre'] ." ". $mostrar['apellido'] ?> </option>

						<?php 
							}
							
						}
						?>
					</select> <br>
			</div>
			<div>
					<label class="labelWhite">Genero: </label><br>
					<select name="genero" id="genero" > 
					<option value="Todos">Todos</option>
						<?php 
							$sql= "SELECT nombre_Genero FROM genero";
							$result=mysqli_query($conexion,$sql);
							if( mysqli_num_rows($result) == 0 )
								echo " No hay ningun genero creado";
							else {

							while($mostrar=mysqli_fetch_array($result)){
						?>
						
						<option> <?php echo  $mostrar ['nombre_Genero'] ?> </option>

						<?php 
							}
						}
						?>
					</select>
			</div>
			<div>
					<label class="labelWhite">Editorial: </label><br>
					<select name="nombreEditorial" id="nombreEditorial" >
					<option value="Todos">Todos</option>
						<?php 
							$sql= "SELECT nombre_Editorial FROM editorial";
							$result=mysqli_query($conexion,$sql);
							if( mysqli_num_rows($result) == 0 )
								echo " No hay ninguna editorial creada";
							else {

							while($mostrar=mysqli_fetch_array($result)){
						?>
						<option> <?php echo $mostrar ['nombre_Editorial']; ?> </option>;
						

						<?php 
							}
						}
						?>
					</select> <br> 
			</div>
			<div style="margin-left: 10px; margin-top: 17px;">
         		 <input class="text" type="search" name="busca" autofocus  size="18" autocomplete="on" >

         		 <input type="submit" class="botonInicio" value="Buscar"></a>
         	</div>
         </div>
        	</form>
		    </div>
			<div class="divBotones">
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>
			<li><a class="botonInicio" href="deletePerfil.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Eliminar Perfil</a></li>
			<?php }?>
			</div>
			<div class="divBotones">
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>
			<li><a href="modificarPerfil.php" class="botonInicio">Configurar perfil</a></li>
				<?php }?>
			</div>
			<div class="divBotones">
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				$result2 = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentausuariotipopremiun WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if((mysqli_num_rows($result) <> 1)&&(mysqli_num_rows($result2) <> 1)){
					?>
			<li><a href="hacersePremium.php" class="botonInicio">¡Hazte Premium!</a></li>
				<?php }?>
			</div>
			<div class="divBotones">
			<li><a href="cerrarSesion.php" class="botonInicio">Cerrar Sesión</a></li>
			</div>
				
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 1){
					?>
					<div style="margin-top: 10px;">
					<li><a href="acceptPremiun.php" class="botonInicio">Peticiones a premium</a></li>
					</div>
					<div style="position: relative; z-index: 3;">
					<ul class="nav">
						<li><a class="botonInicio" href="" >Administrar datos</a>
					
						<ul>
							<a class="botonInicio" href="cargarLibro.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Libro</a></li>
							<a class="botonInicio" href="cargarCapituloLibro.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Capitulo</a></li>
							<a class="botonInicio" href="cargarAutor.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Autor</a></li>
							<a class="botonInicio" href="cargarGenero.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Genero</a></li>
							<a class="botonInicio" href="cargarNoticia.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Noticia</a></li>
							<a class="botonInicio" href="cargarEditorial.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Editorial</a></li>
							<a class="botonInicio" href="cargarTrailer.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Trailer</a></li>
							<a class="botonInicio" href="ListarTrailers.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Listar Trailers</a></li>
							<a class="botonInicio" href="ListarLibros.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Listar Libros</a></li>
							<a class="botonInicio" href="editarAutor.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Editar Autor</a></li>
							<a class="botonInicio" href="deleteGenero.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Eliminar Genero</a></li>
							<a class="botonInicio" href="deleteAutor.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Eliminar Autor</a></li>
							<a class="botonInicio" href="deleteEditorial.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Eliminar Editorial</a></li>
							<a class="botonInicio" href="deleteLibro.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Eliminar Libro</a></li>
							<a class="botonInicio" href="deleteCapitulo.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Eliminar Capitulo</a></li>
							<a class="botonInicio" href="listarReportes.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Listar Reportes</a></li>
							<a class="botonInicio" href="listarCuentasTS.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Listar expiracion de cuentas</a></li>
						</ul>
						</li>
							
					
					</ul>

				<?php
				}
			?>
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
			<div class="registroConfiguracion">
			<form action="deleteAccount.php" method="post" enctype="multipart/form-data" onclick="return confirm();">
			<input type="submit" class="boton" value="Eliminar Cuenta"><br>
			</form>
			<?php
			$result2 = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentausuariotipopremiun WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' and validada='Si' ");
			if(mysqli_num_rows($result2) == 1){
			?>
			 <br>;
			<form action="addBasic.php" method="post" enctype="multipart/form-data" onclick="return confirm();">
			<input type="submit" class="boton" value="Volver a Basico"><br>
			</form>
			</div>
			<?php } ?>
			
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