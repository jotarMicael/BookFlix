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
	<title>Reseñas</title>
</head>
<body background="Imagenes/2.jpg">
	<img src="Imagenes/Titulo.png" class="imagenTituloRegistro">
	<h2 class="tituloSecundarioConfiguracion" >Reseñas realizadas por otros usuarios...</h2>
				
						<?php 
							$sql2="SELECT fechaHora,nombre_Perfil,texto FROM reseña where id_Libro = '" .$_POST['idLibro']."' and nombre_Capitulo='" .$_POST['nCap']."' ";
							$result2=mysqli_query($conexion,$sql2);
							while($mostrar2=mysqli_fetch_array($result2)){;
							
						?>
			
				<div class="fondoComentarios">
				<div class="comentario">
	    			<div class="cuerpoComentario">
	    		<div class="barraTop-publicacion">
				<div>
                <h5 class="textoBarraTop"><?php echo $mostrar2['fechaHora']; ?></h5>	
				</div>
	    		<h5 class="textoBarraTop"><?php echo $mostrar2['nombre_Perfil']; ?></h5>		
	    	</div>
	    	<div>
	    		<textarea disabled maxlength="80" cols="10" rows="10" class="contenido-publicacion" name="publish" id="publish"><?php echo substr($mostrar2['texto'], 0, 80); ?></textarea>
	    	</div>
	    	<div class="barraBot">
				<input type="hidden" name="nCap" id="nCap" value="<?php echo $_POST['nCap'];?>">
				<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_POST['idLibro'];?>">
				<form action="crearReseña.php" method="post" onsubmit="return validar();" enctype="multipart/form-data">
				<input type="submit" class="botonInicio" name="Ver mas..." value="Ver mas...">
				</form>
				<div>
					<input type="submit" class="botonInicio" name="Reportar" value="Reportar">
				</div>
				
	    	</div>
            </div>
			</div>
						<?php 
							 } 
						 ?>
					 

				
	
	  <div class="barraFin">
		<p class="textoBarra"> Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Gallardo Ucero Valentin </p>
    </div>
</body>
</html>