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
					<select name="nombreAutor" id="nombreAutor">
						<?php 
							$sql= "SELECT nombreAutor,apellidoAutor FROM autoreslibro";
							$result=mysqli_query($conexion,$sql);
							if( mysqli_num_rows($result) == 0 )
								echo " No hay ningun autor creado";
							else {

							while($mostrar=mysqli_fetch_array($result)){
						?>
						$nombreComp= 
						<option> <?php echo  $mostrar ['nombreAutor'] ." ". $mostrar['apellidoAutor'] ?> </option>

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
				//if ((isset($_POST['nombreAutor']))&&isset(($_POST['nombreLibro']))&&(isset($_POST['ISBN']))&&(isset($_POST['nombreEditorial']))&&(isset($_FILES['imagen']))&&(isset($_FILES['pdf']))){
					$sql="SELECT id_Editorial from editorial WHERE nombre_Editorial = '" . $_POST["nombreEditorial"] ."'";
					$idEditorial=mysqli_query($conexion,$sql);
					$sql= "INSERT INTO libro (nombre_Libro, id_Editorial, fecha_Lanzamiento, fecha_DeBaja, ImagenTapaLibro,pdf) VALUES ('" .$_POST["nombreLibro" ]."', '$idEditorial', '".$_POST["fecha_Lanzamiento"]."',  '".$_POST["fecha_Baja"]."','$nombre_Imagen', '$nombre_pdf')";
					$result=mysqli_query($conexion,$sql);
					echo "el libro se ha cargado correctamente";
					
				//} 
					
			
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>