<?php session_start(); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Cargar Autor</title>
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
	    <div class="divBotones">
		<a class="botonInicio" href="Configuracion.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Configuracion </a>
	    </div>
		
	 </div>
	 <img class="imagenTitulo" src="Imagenes\Titulo.png">
			<h2 class="tituloSecundarioConfiguracion" >Ingrese los datos del autor</h2>
			<div class="divConfiguracion">
				<form action="cargarAutor.php" method="post" enctype="multipart/form-data">
				  <div class="registroConfiguracion">
					<label class="labelWhite">Nombre: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="nombreAutor" name="nombreAutor" value="Ingrese el nombre"><br>
					<label class="labelWhite">Apellido: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="apellidoAutor" name="apellidoAutor" value="Ingrese el apellido"><br>
					<label class="labelWhite">Enlace a bibliografia: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="bibliografia" name="bibliografia" value="Ingrese un link"><br>
					<input type="submit" class="boton" value="Ingresar"><br>
				  </div>
				</form>
		   	</div>
			<?php 
				if ((isset($_POST['nombreAutor'])) && (isset($_POST['apellidoAutor']))) {
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
						echo "Se ha ingresado correctamente";

					}
				}
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>