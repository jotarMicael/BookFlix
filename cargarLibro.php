<?php session_start(); 
include('conexion.php');
session_start();
if ($_SESSION['actualizar']==0){
	$_SESSION['perfilImagen']= $_GET['img'];
	$_SESSION['perfilNombre']= $_GET['perfil'];
	$_SESSION['actualizar']=1;
}

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
	<title>Cargar Libro</title>
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
			<h2 class="tituloSecundarioConfiguracion" >Ingrese los datos del libro</h2>
			<div class="divConfiguracion">
				
			<div class="registroConfiguracion">
				  <form method="POST" action="cargarLibro.php" enctype="multipart/form-data">
					<label class="labelWhite">Nombre del Libro: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="nombreLibro" name="nombreLibro"><br>
					<label class="labelWhite">ISBN: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="ISBN" maxlength="13" name="ISBN"><br>
					<label class="labelWhite">Fecha de Lanzamiento: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="fecha_Lanzamiento" length="13" name="fecha_Lanzamiento" placeholder="aaaa-mm-dd"><br>
					<label class="labelWhite">Disponibilidad de basico hasta: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="fecha_BajaBasico" length="13" name="fecha_BajaBasico" placeholder="aaaa-mm-dd"><br>
					<label class="labelWhite">Disponibilidad de premium hasta: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="fecha_BajaPremium" length="13" name="fecha_BajaPremium" placeholder="aaaa-mm-dd"><br>
					<label class="labelWhite">Editorial: </label><br>
					<div>
					<select name="nombreEditorial" id="nombreEditorial">
						<?php 
							$sql= "SELECT nombre_Editorial FROM editorial WHERE disponible='Si' ";
							$result=mysqli_query($conexion,$sql);
							if( mysqli_num_rows($result) == 0 )
								echo " No hay ninguna editorial creada";
							else {

							while($mostrar=mysqli_fetch_array($result)){
						?>
						<option> <?php echo $mostrar ['nombre_Editorial']; ?> </option>

						<?php 
							}
						}
						?>
					</select> <br> 
					<br>
					<label class="labelWhite">Autor/es: </label><br>
					<select multiple name="nombreCompletoAutor[]" id="nombreCompletoAutor[]">
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
					</select>
					</select> <br>
					<br>
					<label class="labelWhite">Genero: </label><br>
					<select name="genero[]" id="genero[]" multiple >
						<?php 
							$sql= "SELECT nombre_Genero FROM genero WHERE disponible='Si' ";
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
					<br>
					<label class="labelWhite">Seleccionar portada: </label>
					<input type="file" class="redondeado" id="imagen" name="imagen" accept="image/png,image/jpeg"><br>
					<label class="labelWhite">Cantidad de Capitulos: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="cantCap" name="cantCap"><br>
					<label class="labelWhite">Nombre del Capitulo: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="nombreCapitulo" name="nombreCapitulo"><br>
					<label class="labelWhite">Seleccionar pdf del capitulo o libro completo: </label>
					<input type="file" class="redondeado" id="pdf" name="pdf" accept="application/pdf"><br>
					<div>	
					<input type="checkbox" name="premium" > <strong class="labelWhite" >Contenido premium</strong><br>
					</div>
					<br>
					<input type="submit" class="boton" value="Ingresar"><br>
					</form>
				  </div>
		   	</div>	
		   	</div>
			<?php 
			
				if (isset($_POST['nombreLibro'])&&isset($_POST['ISBN'])&&isset($_POST['fecha_Lanzamiento'])&&isset($_POST['fecha_BajaBasico'])&&isset($_FILES['imagen'])&&isset($_FILES['pdf'])&&isset($_POST['cantCap'])){

					if(!empty($_FILES['imagen'])){

						$nombre_Imagen=$_FILES ['imagen']['name'];
						$tipo_Imagen=$_FILES ['imagen']['type'];
						$tamagno_Imagen=$_FILES ['imagen']['size'];

						if ($tamagno_Imagen<=30000000){
							if(($tipo_Imagen=="image/jpg") || ($tipo_Imagen =="image/png") || ($tipo_Imagen=="image/jpeg")){
								//Ruta de la carpeta destino
								$carpeta_Destino=$_SERVER ['DOCUMENT_ROOT'].'/BookFlix/Portadas/';
								//Mover imagen del directorio temporal al directorio escogido
								move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_Destino.$nombre_Imagen);
								header("Location: cargarLibro.php");
							}
							else {
								echo " <font color=white  size='5pt'> Solo se puede subir: png, jpg, jpeg </font>";
							}
							
						}
						else{
							echo "<font color=white  size='5pt'> El tamaño de la imagen es demasiado grande </font>";
						}
					}
					
					if(!empty($_FILES['pdf'])){

						$nombre_pdf=$_FILES['pdf']['name'];
						$tipo_pdf=$_FILES['pdf']['type'];
						$tamagno_pdf=$_FILES['pdf']['size'];

						if ($tamagno_pdf<=99999){
							if($tipo_pdf=="application/pdf"){

								//Ruta de la carpeta destino
								$carpeta_Destino=$_SERVER ['DOCUMENT_ROOT'].'/BookFlix/pdfs/';
								//Mover imagen del directorio temporal al directorio escogido
								move_uploaded_file($_FILES['pdf']['tmp_name'], $carpeta_Destino.$nombre_pdf);
								//header("Location: cargarLibro.php");
							}
							else {

								echo "<font color=white  size='5pt'> Solo se puede subir pdf </font>";
							}
								
						}
						else{

							echo "<font color=white  size='5pt'> El tamaño del pdf es demasiado grande </font>";
						}
					}

					$fecha_1 = $_POST["fecha_Lanzamiento"]; //Recibe una string en formato dd-mm-yyyy 
					$fecha_2 = $_POST["fecha_BajaBasico"]; //Recibe una string en formato dd-mm-yyyy 
					$fecha_3 = $_POST["fecha_BajaPremium"];

					$inicio = strtotime($fecha_1); //Convierte el string a formato de fecha en php
					$baja = strtotime($fecha_2); //Convierte el string a formato de fecha en php
					$baja2 = strtotime($fecha_3);

					$inicio = date('Y-m-d',$inicio); //Lo comvierte a formato de fecha en MySQL
					$baja = date('Y-m-d',$baja); //Lo comvierte a formato de fecha en MySQL
					$baja2 = date('Y-m-d',$baja2);

					$sql3="SELECT * from libro WHERE ISBN = '" .$_POST['ISBN']."' ";
					$result3=mysqli_query($conexion,$sql3);

					
					if( mysqli_num_rows($result3) == 1 ){
						echo "<font color=white  size='5pt'> Ya existe cargado un libro con ese ISBN </font>";
						header("Location: cargarLibro.php");
					}	 
					else{

						$sql="SELECT id_Editorial from editorial WHERE nombre_Editorial = '" .$_POST['nombreEditorial']."'";
						$result=mysqli_query($conexion,$sql);
						$mostrar=mysqli_fetch_array($result, MYSQLI_ASSOC);
						$idEdi = $mostrar["id_Editorial"];

						if(empty($nombre_Imagen) || (empty($nombre_pdf))){
							$_SESSION['error']='Todos los campos deben estar completos';
							header("Location: cargarLibro.php");
						}

						else{

							if(isset($_POST['premium']))
								$_POST['premium']='Si';
							else
								$_POST['premium']='No';
						
						$sql2= "INSERT INTO libro(nombre_Libro, id_Editorial, fecha_Lanzamiento, fecha_DeBaja, fecha_DeBaja2, imagenTapaLibro,ISBN,capitulos,premium) VALUES ('" .$_POST["nombreLibro" ]."', '$idEdi','$inicio', '$baja','$baja2','$nombre_Imagen','".$_POST["ISBN"]."','".$_POST["cantCap"]."','" .$_POST["premium" ]."')";
						mysqli_query($conexion,$sql2);

							$sql4="SELECT id_Libro from libro WHERE nombre_Libro = '" .$_POST["nombreLibro" ]."' ";
							$result4=mysqli_query($conexion,$sql4);
							$mostrar3=mysqli_fetch_array($result4, MYSQLI_ASSOC);
							$idLibro=$mostrar3['id_Libro'];
							

								
						
						$gen = $_POST['genero'];
						foreach ($gen as $option){
							$sql6="SELECT id_Genero from genero WHERE nombre_Genero = '$option' ";
							$result6=mysqli_query($conexion,$sql6);
							$mostrar5=mysqli_fetch_array($result6, MYSQLI_ASSOC);
							$sql5= "INSERT INTO generopertenecelibro (id_Genero,id_Libro) VALUES ('" .$mostrar5["id_Genero"]."','$idLibro')";
							$result15=mysqli_query($conexion,$sql5);
							
							}
							
						$sql6= "INSERT INTO capitulo(nombre_Capitulo,id_Libro,pdf) VALUES ('" .$_POST["nombreCapitulo" ]."','$idLibro','$nombre_pdf')";
						$result16=mysqli_query($conexion,$sql6);
					

						$nombr=$_POST['nombreCompletoAutor'];
						foreach ($nombr as $option){
							$porcion= explode(" ", $option);
							$sql3="SELECT id_Autor from autor WHERE nombre = '$porcion[0]' AND apellido = '$porcion[1]'  ";
							$result3=mysqli_query($conexion,$sql3);
							$mostrar2=mysqli_fetch_array($result3, MYSQLI_ASSOC);
							$sql= "INSERT INTO autoreslibro (id_Autor,id_Libro) VALUES ('" .$mostrar2["id_Autor"]."','$idLibro')";
							$result5=mysqli_query($conexion,$sql);
							}
							echo "<font color=white  size='5pt'> El libro se ha cargado correctamente </font>";
							
							header("Location: cargarLibro.php");
						}
					}
				}
				
			
			else{
				echo "<font color=white  size='5pt'> Todos los campos deben estar completos </font>";
			}
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>