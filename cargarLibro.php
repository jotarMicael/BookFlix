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
					<input type="text" class="redondeado" autocomplete="on" id="nombreAutor" name="nombreAutor"><br>
					<label class="labelWhite">ISBN: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="apellidoAutor" length="13" name="apellidoAutor"><br>
					<label class="labelWhite">Editorial: </label><br>
					<div>
					<select name="editorial" id="editorial">
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
						<option> <?php echo  $mostrar ['nombreAutor'] ." ". $mostrar['apellidoAutor'] ?> </option>

						<?php 
							}
						}
						?>
					</select>
					</div>
					<br>
					<input type="submit" class="boton" value="Ingresar"><br>
					</form>
				  </div>
				
		   	</div>
			<?php 
				if (isset($_POST['nombreAutor'])&&isset($_POST['apellidoAutor'])){

					//Consulto en la bbdd si ya existe el autor que quiero ingresar
					$sql= "SELECT apellidoAutor FROM autoreslibro WHERE apellidoAutor = '".$_POST['apellidoAutor']."'";
					$result=mysqli_query($conexion,$sql);
					
					if( mysqli_num_rows($result) == 1 ){
						echo "Este autor ya se encuentra ingresado" ;
						//ingreso el autor
					}
					else {
						$sql= "INSERT INTO autoreslibro (nombreAutor, apellidoAutor,bibliografia) VALUES ('" .$_POST["nombreAutor"]."', '".$_POST["apellidoAutor"]."','".$_POST["bibliografia"]."' )";
						$result=mysqli_query($conexion,$sql);
						echo "El autor se ha cargado correctamente";

					}
				}
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>