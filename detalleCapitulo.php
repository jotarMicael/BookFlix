<?php session_start(); 
include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Detalle Del Capitulo</title>
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
					<a href="leerLibro.php?&idLibro=<?php echo $_GET['idLibro'];?>&perfil=<?php echo $_GET['perfil'];?>&nCap=<?php echo $_GET['nCap'];?>" class="labelWhite"><strong> Leer: <?php
				 echo $_GET['nCap']."<br /> <br />"?>  </strong>
					
				  
				  
				
		   	</div>
			   </div>
				  <div class="divMargin">
			 <br> <br>
			 <form action="listarReseñas.php" method="post" enctype="multipart/form-data" onclick="return confirm();">
			 <input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			<input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>">
			<input type="submit" class="boton" value="Ver Reseñas"><br> 
     		</form> 
			 </div>
			   <?php
				$sql2= "SELECT id_Capitulo FROM capitulo WHERE nombre_capitulo= '".$_GET['nCap']."' and id_Libro='".$_GET['idLibro']."' ";
  				$result2=mysqli_query($conexion,$sql2);
				$mostrar=mysqli_fetch_array($result2, MYSQLI_ASSOC);
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				$result3 = mysqli_query($conexion, "SELECT nombre_Perfil FROM perfilleyocapitulo WHERE nombre_Perfil = '".$_SESSION['perfilNombre']."' and id_Capitulo = '".$mostrar['id_Capitulo']."'  ");
				if((mysqli_num_rows($result) == 0)&&(mysqli_num_rows($result3) == 0)){
					$_SESSION['idC']=$mostrar['id_Capitulo'];
					?>
			<div class="divMargin">
			<form action="finishCap.php?&nCap=<?php echo $_GET['nCap'];?>&perfil=<?php echo $_GET['perfil'];?>" method="post" enctype="multipart/form-data" onclick="return confirm();">
			<input type="submit" class="boton" onclick="return confirm()" value="Finalizar Lectura"><br> 
     		</form> 
			</div>
			<?php }
			else{
				if(mysqli_num_rows($result) == 0){
			?>
			<form action="crearReseña.php" method="post" enctype="multipart/form-data" onclick="return confirm();">
			<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			<input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>">
			<input type="submit" class="boton" onclick="return confirm()" value="Dejar Reseña"><br> 
     		</form>
			 <div class="divMargin">
			 <br> <br>
			 <form action="crearCalificacion.php" method="post" enctype="multipart/form-data" onclick="return confirm();">
			<input type="submit" class="boton" onclick="return confirm()" value="Calificar"><br> 
     		</form> 
			 </div>
			 <?php } } ?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>