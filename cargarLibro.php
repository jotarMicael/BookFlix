<?php session_start(); 
	include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Cargar Libro</title>
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
		<a class="botonInicio" href="miPerfil.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Perfil </a>
	    </div>		
	 </div>
	 <img class="imagenTitulo" src="Imagenes\Titulo.png">
			<h2 class="tituloSecundarioConfiguracion" >Ingrese los datos del libro</h2>
			<div class="divConfiguracion">	
				  <div class="registroConfiguracion">
				  <form action="cargarLibro.php" method="post" enctype="multipart/form-data">
					<label class="labelWhite">Nombre del Libro: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="nombreLibro" name="nombreLibro"><br>
					<label class="labelWhite">ISBN: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="ISBN" length="13" name="ISBN"><br>
					<label class="labelWhite">Fecha de Lanzamiento: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="fecha_Lanzamiento" length="13" name="fecha_Lanzamiento"><br>
					<label class="labelWhite">Fecha de Baja: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="fecha_Baja" length="13" name="fecha_Baja"><br>
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
			<?php 
				//if ((isset($_POST['nombreCompletoAutor']))&&isset(($_POST['nombreLibro']))&&((isset($_POST['ISBN']))&&((isset($_POST['nombreEditorial']))&&((isset($_FILES['imagen']))&&((isset($_FILES['pdf']))){
					if (isset($_POST['nombreLibro'])&&isset($_POST['ISBN'])){
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
								header("Location: cargarLibro.php");
							}
							else {
								echo "Solo se puede subir: png, jpg, jpeg";
							}
							
						}
						else{
							echo "El tamaño de la imagen es demasiado grande";
						}
						$fecha_1 = $_POST["fecha_Lanzamiento"]; //Recibe una string en formato dd-mm-yyyy 
						$fecha_2 = $_POST["fecha_Baja"]; //Recibe una string en formato dd-mm-yyyy 

						$inicio = strtotime($fecha_1); //Convierte el string a formato de fecha en php
						$baja = strtotime($fecha_2); //Convierte el string a formato de fecha en php

						$inicio = date('Y-m-d',$inicio); //Lo comvierte a formato de fecha en MySQL
						$baja = date('Y-m-d',$fin); //Lo comvierte a formato de fecha en MySQL

						echo $nombre_Imagen;
						$sql1="SELECT id_Editorial from editorial WHERE nombre_Editorial = '" .$_POST["nombreEditorial"] ."' ";
						$idEditorial=mysqli_query($conexion,$sql1);
						
						$sql= "INSERT INTO libro(nombre_Libro, id_Editorial, fecha_Lanzamiento, fecha_DeBaja, imagenTapaLibro,pdf,autor) VALUES ('" .$_POST["nombreLibro" ]."', '$idEditorial', '$inicio',  '$baja','$nombre_Imagen', '$nombre_pdf','".$_POST["nombreCompletoAutor"]."')";
						$result=mysqli_query($conexion,$sql);
						echo "el libro se ha cargado correctamente";

					}

				}



					
					
				//} 
					
			
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>