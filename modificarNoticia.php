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
	    <div class="divBotones">
		<a class="botonInicio" href="miPerfil.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Perfil </a>
	    </div>		
	 </div>
	 <img class="imagenTitulo" src="Imagenes\Titulo.png">
			<h2 class="tituloSecundarioConfiguracion" >Modifique la noticia</h2>
			
				
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
			   <script>  alert ('<?php echo $_GET['idNoti'] ?>') </script>;
			<?php 
				if (isset($_POST['publish'])){
						
						$sql2 = "UPDATE noticia SET texto = '".$_POST['publish']."' WHERE id_Noticia = '17'";
						$result=mysqli_query($conexion,$sql2);
						echo "La noticia se ha modificado correctamente";

					}
			?>
			
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>