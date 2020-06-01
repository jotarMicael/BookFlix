<?php session_start(); 
include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Cargar Noticia</title>
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
			<h2 class="tituloSecundarioConfiguracion" >Ingrese la noticia</h2>
			
				
			<div class="fondoComentarios">
				<form action="publicar.php" method="POST" onsubmit="return validar();" enctype="multipart/form-data">
				<div class="comentario">
	    			<div class="cuerpoComentario">
	    		<div class="barraTop-publicacion">	
	    		<h5 class="textoBarraTop"><?php echo $_SESSION['nombrePerfil']; ?></h5>		
	    	</div>
	    	<div>
	    		<textarea cols="3" rows="5" class="contenido-publicacion" name = "publish" id="publish"></textarea>
	    	</div>
	    	<div class="barraBot">
	    		<input type="submit" class="botonInicio" name="Publicar" value="Publicar">
	    	</div>
	    
	</div>
	</form>	
				
		   	</div>
			<?php 
				if (isset($_POST['publish'])){

					//Consulto en la bbdd si ya existe la noticia que quiero ingresar
					$sql= "SELECT texto FROM noticia WHERE texto = '".$_POST['publish']."'";
					$result=mysqli_query($conexion,$sql);
					
					if( mysqli_num_rows($result) == 1 ){
						echo "<font color=white  size='5pt'>Esta noticia ya se encuentra cargada en el sistema</font>";
						//ingreso la noticia
					}
					else {
						$sql= "INSERT INTO noticia(texto) VALUES ('" .$_POST["publish"]."')";
						$result=mysqli_query($conexion,$sql);
						echo "<font color=white  size='5pt'> La noticia se ha cargado correctamente</font>";

					}
				}
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>