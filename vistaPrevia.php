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
	<title>Vista Previa</title>
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
			<li><a href="Home.php?&perfil=<?php echo $_GET['perfil'];?>" class="botonInicio">Inicio</a></li>
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
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>		
			<li><a class="botonInicio" href="Configuracion.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Configuracion</a></li>
			<?php }?>
			</div>
			<?php
				/*$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 1){
					?>
					<ul class="nav">
						<li><a class="botonInicio" href="" >Administrar datos</a>
					
						<ul>
							<a class="botonInicio" href="cargarLibro.php">Cargar Libro</a></li>
							<a class="botonInicio" href="cargarAutor.php">Cargar Autor</a></li>
							<a class="botonInicio" href="cargarGenero.php">Cargar Genero</a></li>
						</ul>
						</li>
							
					
					
					</ul>

				<?php
				}*/
			?>	
	</div>
	<div class="divLibrosRandom" style="margin-left: 25%;">
		<div class="divLibroVistaPrevia">
			<!-- Aca se van a tomar los datos del libro que pertenecen a otra tabla para ser mostrados en la vista previa del libro -->
		<?php 
		  	// Consulta para obtener autores del libro
		  $resultDos = mysqli_query($conexion, "SELECT nombre,apellido FROM autor INNER JOIN autoreslibro ON autor.id_Autor=autoreslibro.id_Autor WHERE id_Libro = '".$_GET['idLibro']."' ");
			// Consulta para obtener el genero 
		  $resultTres = mysqli_query($conexion, "SELECT nombre_Genero FROM genero INNER JOIN generopertenecelibro ON genero.id_Genero=generopertenecelibro.id_Genero WHERE id_Libro = '".$_GET['idLibro']."' ");
	    	// Consulta para obtener la editorial
		  $resultCuatro = mysqli_query($conexion, "SELECT nombre_Editorial,ISBN FROM libro INNER JOIN editorial ON libro.id_Editorial = editorial.id_Editorial WHERE libro.id_Libro = '".$_GET['idLibro']."' ");
			  // Consulta para obtener los capitulos de los libros
		  $resultCinco = mysqli_query($conexion, "SELECT nombre_Capitulo FROM capitulo INNER JOIN libro ON libro.id_Libro = capitulo.id_Libro WHERE libro.id_Libro = '".$_GET['idLibro']."' ");
		  
		  $sql="SELECT nombre_Editorial from editorial WHERE id_Editorial = '" .$_GET['idEdi']."'";

		  $result=mysqli_query($conexion,$sql);
			 ?>
		  
		  	<div>
			<image class="home" style="height: 475px; width:300px; border-radius: 20px;" width="100%" src="/BookFlix/Portadas/<?php echo  $_GET['libro']?>"/>
			</div>
			<div style="text-align: center; margin-left: 50px; margin-top: 30px;">
				<div class="divMargin">
			<label class="labelWhite">Titulo: </label>
			<label class="labelWhite"> <strong> <?php echo $_GET['titulo'] ?> </strong></label><br>
			</div>
			<div class="divMargin">
			<label class="labelWhite" >Autor/es: </label>
			<label class="labelWhite"> <strong> <?php while($mostrar=mysqli_fetch_array($resultDos)) {
				echo $mostrar['nombre'];?> <space> <?php echo $mostrar['apellido'].' ';

			}?> </strong></label> <br>
			</div>
			<div class="divMargin">
			<label class="labelWhite">Genero/s: </label>
			<label class="labelWhite"> <strong> <?php  while($mostrar2=mysqli_fetch_array($resultTres)) {
				echo $mostrar2['nombre_Genero'].' ';?>

			<?php } ?> </strong> </label><br>
			</div>
			<div class="divMargin">
			<label class="labelWhite">Editorial: </label>
			<label class="labelWhite"> <strong ><?php while($mostrar3=mysqli_fetch_array($resultCuatro)) {
				echo $mostrar3['nombre_Editorial']; echo"<br>";echo"<br>";
				 $ISBN = 'ISBN: ';
				echo $ISBN; echo $mostrar3['ISBN'];

			} ?> </strong> </label><br>
			</div>
			<div class="divMargin">
			<?php $n=1; while($mostrar4=mysqli_fetch_array($resultCinco)) {?>
			 <a href="detalleCapitulo.php?&idLibro=<?php echo $_GET['idLibro'];?>&perfil=<?php echo $_GET['perfil'];?>&nCap=<?php echo $mostrar4['nombre_Capitulo'];?>" class="labelWhite"> Capitulo <?php echo $n; ?>: <strong> <?php
				 echo $mostrar4['nombre_Capitulo']."<br /> <br />"; $n= $n+1;?> 
				
			 </strong> <?php } ?> </a>
			</div>
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 0){
					?>
			<div class="divMargin">
			<form>
			<input type="submit" class="boton" onclick="return confirm()" value="Finalizar Lectura"><br> 
     		</form> 
			</div>
			<?php }?>

			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 1){
					?>
			<div class="divMargin">
			 <a href="modificarLibro.php?&idLibro=<?php echo $_GET['idLibro'];?>&imagen=<?php echo $_GET['libro'];?>" class="labelWhite"> <strong>Modificar libro </strong> </a>
			</div>
				<?php }?>
			</div>
		</div>
		
	</div>

</body>
</html>