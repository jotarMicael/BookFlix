<?php session_start(); 
include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Cargar Genero</title>
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
	 </div>
	 <img class="imagenTitulo" src="Imagenes\Titulo.png">
			<h2 class="tituloSecundarioConfiguracion" > Nombre: "<?php echo $_GET["nCap"]?>" </h2>
			<div class="divConfiguracion">
				
				  <div class="registroConfiguracion">
				
					<label class="labelWhite"> Este capitulo tiene una recomendacion de X estrellas por los usuarios que lo han leido. </label><br><br>
					<a href="leerLibro.php?&idLibro=<?php echo $_GET['idLibro'];?>&perfil=<?php echo $_GET['perfil'];?>&nCap=<?php echo $_GET['nCap'];?>" class="labelWhite"><strong> Leer <?php
				 echo $_GET['nCap']."<br /> <br />"?>  </strong>
					
				  </div>
				
		   	</div>
			<?php 
				if (isset($_POST['nombreGenero'])){

					//Consulto en la bbdd si ya existe el genero que quiero ingresar
					$sql= "SELECT nombre_Genero FROM genero WHERE nombre_Genero = '".$_POST['nombreGenero']."'";
					$result=mysqli_query($conexion,$sql);
					
					if( mysqli_num_rows($result) == 1 ){
						echo "<font color=white  size='5pt'> Este genero ya se encuentra cargado en el sistema </font>";
						//ingreso el genero
					}
					else {
						$sql= "INSERT INTO genero (nombre_Genero) VALUES ('" .$_POST["nombreGenero"]."')";
						$result=mysqli_query($conexion,$sql);
						echo "<font color=white  size='5pt'> El genero se ha cargado correctamente </font>";

					}
				}
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>