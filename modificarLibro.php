<?php session_start(); 
include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Modificar Libro</title>
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
			<li><a href="Home.php" class="botonInicio">Inicio</a></li>
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
			<label class="labelWhite">Buscar: </label>
			<input type="text" class="redondeado" autocomplete="on" id="" name="">
			
		    </div>
			<div class="divBotones">
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>
			<li><a class="botonInicio" href="Configuracion.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Configuracion</a></li>
			<?php }?>
			</div>
				
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 1){
					?>
					<ul class="nav">
						<li><a class="botonInicio" href="" >Administrar datos</a>
					
						<ul>
							<a class="botonInicio" href="cargarLibro.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Libro</a></li>
							<a class="botonInicio" href="cargarAutor.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Autor</a></li>
							<a class="botonInicio" href="cargarGenero.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Genero</a></li>
							<a class="botonInicio" href="cargarNoticia.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Noticia</a></li>
						</ul>
						</li>
							
					
					
					</ul>

				<?php
				}
			?>	
	</div>
			<h2 class="tituloSecundarioConfiguracion" >Modifique los datos que desee:</h2>
			<div class="divConfiguracion">
				
			<div class="registroConfiguracion">
				  <form method="POST" action="modificarLibro.php?idLibro=<?php echo $_GET['idLibro'] ?>" enctype="multipart/form-data">
					<label class="labelWhite">Nombre del Libro: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="nombreLibro" name="nombreLibro"><br>
					<label class="labelWhite">ISBN: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="ISBN" maxlength="13" name="ISBN"><br>
					<label class="labelWhite">Fecha de Lanzamiento: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="fecha_Lanzamiento" maxlength="10" name="fecha_Lanzamiento"><br>
					<label class="labelWhite">Fecha de Baja: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="fecha_Baja" maxlength="10" name="fecha_Baja"><br>
					<label class="labelWhite">Editorial: </label><br>
					<div>
					<select name="nombreEditorial" id="nombreEditorial">
						<?php 
							$sql= "SELECT nombre_Editorial FROM editorial";
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
					<label class="labelWhite">Autor: </label><br>
					<select name="nombreCompletoAutor" id="nombreCompletoAutor">
						<?php 
							$sql= "SELECT nombreAutor,apellidoAutor FROM autoreslibro";
							$result=mysqli_query($conexion,$sql);
							if( mysqli_num_rows($result) == 0 )
								echo " No hay ningun autor creado";
							else {

							while($mostrar=mysqli_fetch_array($result)){
						?>

						<option> <?php echo  $mostrar ['nombreAutor'] ." ". $mostrar['apellidoAutor'] ?> </option>

						<?php 
							}
						}
						?>
					</select> <br>
					<br>
					<label class="labelWhite">Genero: </label><br>
					<select name="genero" id="genero">
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
					<br>
					<label class="labelWhite">Seleccionar portada: </label>
					<input type="file" class="redondeado" id="imagen" name="imagen" accept="image/png,image/jpeg"><br>
					<label class="labelWhite">Seleccionar pdf: </label>
					<input type="file" class="redondeado" id="pdf" name="pdf" accept="application/pdf"><br>
					<input type="submit" class="boton" value="Ingresar"><br>
					</form>
				  </div>
		   	</div>	
		   	</div>
			<?php 
				if (isset($_POST['nombreLibro'])||isset($_POST['ISBN'])||isset($_POST['fecha_Lanzamiento'])||isset($_POST['fecha_Baja'])||isset($_FILES['imagen'])||isset($_FILES['pdf'])){

					if(isset($_FILES['imagen'])){
						$nombre_Imagen = $_FILES ['imagen']['name'];
						$tipo_Imagen = $_FILES ['imagen']['type'];
						$tamagno_Imagen = $_FILES ['imagen']['size'];
						if ($tamagno_Imagen<=30000000){
							if(($tipo_Imagen == "image/jpg") || ($tipo_Imagen == "image/png") || ($tipo_Imagen == "image/jpeg")){
								//Ruta de la carpeta destino
								$carpeta_Destino = $_SERVER ['DOCUMENT_ROOT'] . '/BookFlix/Portadas/';
								//Mover imagen del directorio temporal al directorio escogido
								move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_Destino.$nombre_Imagen);
								//header("Location: modificarLibro.php");
							}
							else {
								if(isset($_FILES['imagen'])){
								echo "Solo se puede subir: png, jpg, jpeg";
								}
							}
							
						}
						else{
							echo "El tamaño de la imagen es demasiado grande";
						}
					}	
					
						//if(isset($_FILES['pdf'])){
							$nombre_pdf = $_FILES ['pdf']['name'];
							$tipo_pdf = $_FILES ['pdf']['type'];
							$tamagno_pdf = $_FILES ['pdf']['size'];
							if ($tamagno_pdf<=100000000){
								if(($tipo_pdf == 'application/pdf')){
									//Ruta de la carpeta destino
									$carpeta_Destino = $_SERVER ['DOCUMENT_ROOT'] . '/BookFlix/pdfs/';
									//Mover imagen del directorio temporal al directorio escogido
									move_uploaded_file($_FILES['pdf']['tmp_name'], $carpeta_Destino.$nombre_pdf);
									//header("Location: cargarLibro.php");
								}
								else {
									if(isset($_FILES['pdf'])){
									echo "Solo se puede subir: pdf";
									}
								}
								
							}
							else{
								echo "El tamaño del pdf es demasiado grande";
							}
				//		}
						$fecha_1 = $_POST["fecha_Lanzamiento"]; //Recibe una string en formato dd-mm-yyyy 
						$fecha_2 = $_POST["fecha_Baja"]; //Recibe una string en formato dd-mm-yyyy 

						$inicio = strtotime($fecha_1); //Convierte el string a formato de fecha en php
						$baja = strtotime($fecha_2); //Convierte el string a formato de fecha en php

						$inicio = date('Y-m-d',$inicio); //Lo comvierte a formato de fecha en MySQL
						$baja = date('Y-m-d',$fin); //Lo comvierte a formato de fecha en MySQL

						$sql="SELECT id_Editorial from editorial WHERE nombre_Editorial = '" .$_POST['nombreEditorial']."'";
						 $result=mysqli_query($conexion,$sql);
						 
						$mostrar=mysqli_fetch_array($result); 

						 			 
					$idLibro= $_GET['idLibro'];
					$sql2= "UPDATE libro SET nombre_Libro='" .$_POST["nombreLibro" ]."', id_Editorial= '" .$mostrar["id_Editorial"]."', fecha_Lanzamiento='$inicio', fecha_DeBaja= '$baja', imagenTapaLibro='$nombre_Imagen',pdf='$nombre_pdf',autor='".$_POST["nombreCompletoAutor"]."',genero='" .$_POST["genero" ]."',ISBN='".$_POST["ISBN"]."' WHERE id_Libro = $idLibro ";
					$result=mysqli_query($conexion,$sql2) or die(mysql_error());
					ob_start();
 					echo "El Libro se ha modificado correctamente";
					header("Location: Home.php");

					
				}
				else{
					echo "No se ha modificado ningun dato, pruebe nuevamente";
				}

			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>