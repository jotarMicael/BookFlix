<?php session_start();
 include('conexion.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity=" sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="all.css" rel="stylesheet" type="text/css">
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<script type="text/javascript" src="scriptInicio.js"></script>
	<title>Hacerse Premium</title>
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
<body background="Imagenes/2.jpg">
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
			<li><a class="botonInicio" href="Configuracion.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Configuracion</a></li>
			<?php }?>
			</div>
			<div class="divBotones">
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>
			<li><a href="verYCrearPerfiles.php" class="botonInicio">Cambiar de perfil</a></li>
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
	<div class="divLibrosRandom" style="margin-left: 25%;">
		<div class="divLibroVistaPrevia">
			  <label class="labelWhite"> <strong>Haciendote Premium tendras acceso a leer libros exclusivos y a tener hasta 4 perfiles en la cuenta. Una vez realizado el pago de $1, ya podra disfrutar de los beneficios mencionados anteriormente. 
			  Haciendo click en el boton "Mejorar a Premium", se confirmara su peticion para ser un usuario premium, una vez que sea corroborada y validada su peticion, 
			  se le otorgará su beneficio. Haciendo esto, usted estara aceptando todos los terminos y condiciones expuestos en la plataforma.
			   </strong></label><br> <br>
			   <form action="addPremium.php" method="post" enctype="multipart/form-data" onclick="return confirm();">
			   <input type="submit" class="boton" value="Aceptar"><br>
				</form> <br> <br>
				<form action="verYCrearPerfiles.php" method="post" enctype="multipart/form-data" onclick="return confirm();">
			   <input type="submit" class="boton" value="Cancelar"><br>
			   </form>
		</form>	
		</div>
		
	</div>	
				
</body>
</html>