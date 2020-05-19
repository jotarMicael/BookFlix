<?php session_start(); 
include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Cargar Editorial</title>
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
			<h2 class="tituloSecundarioConfiguracion" >Ingrese el nombre de la editorial</h2>
			<div class="divConfiguracion">
				
				  <div class="registroConfiguracion">
				  <form action="cargarEditorial.php" method="post" enctype="multipart/form-data">
					<label class="labelWhite">Nombre: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="nombreEditorial" name="nombreEditorial"><br>
					<input type="submit" class="boton" value="Ingresar"><br>
					</form>
				  </div>
				
		   	</div>
			<?php 
				if (isset($_POST['nombreEditorial'])){

					//Consulto en la bbdd si ya existe la Editorial que quiero ingresar
					$sql= "SELECT nombre_Editorial FROM editorial WHERE nombre_Editorial = '".$_POST['nombreEditorial']."'";
					$result=mysqli_query($conexion,$sql);
					
					if( mysqli_num_rows($result) == 1 ){
						echo "Esta Editorial ya se encuentra cargada en el sistema" ;
						//ingresa la Editorial
					}
					else {
						$sql= "INSERT INTO editorial (nombre_Editorial) VALUES ('" .$_POST["nombreEditorial"]."')";
						$result=mysqli_query($conexion,$sql);
						echo "La Editorial se ha cargado correctamente";

					}
				}
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>