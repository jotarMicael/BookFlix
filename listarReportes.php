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
	<script type="text/javascript" src="scriptMostrar.js"></script>
	<script type="text/javascript" src="scriptConfirm.js"></script>
	
	<title>Reportes de reseñas</title>
</head>
<body background="Imagenes/2.jpg">
	<img src="Imagenes/Titulo.png" class="imagenTituloRegistro">
	<h2 class="tituloSecundarioConfiguracion" >Reportes realizados por los usuarios: </h2>
				
						<?php 
							$sql2="SELECT fechaHora,nombre_Perfil,texto,spoiler FROM reseña where reportada='Si' ";
                            $result2=mysqli_query($conexion,$sql2);
                            if (!empty($_SESSION['error'])) {
                                echo "<font color=white  size='5pt'> ".$_SESSION['error']." </font>";
                                unset($_SESSION['error']);
                            }
							while($mostrar2=mysqli_fetch_array($result2)){;
						?>
						 <div class="fondoComentarios">
				<div class="comentario">
	    			<div class="cuerpoComentario">
	    		<div class="barraTop-publicacion">
				<div>
                <h5 class="textoBarraTop"><?php echo $mostrar2['fechaHora']; ?></h5>	
				</div >
	    		<h5 class="textoBarraTop"><?php echo $mostrar2['nombre_Perfil']; ?></h5>		
	    	</div>
	    	<div>
				<form action="cancelarReporte.php" method="post" onsubmit="confirm();" enctype="multipart/form-data">
	    		<textarea disabled maxlength="80" class="contenido-publicacion" name="publish" id="publish"><?php echo $mostrar2['texto']; ?></textarea>
	    	</div>
	    	<div class="barraBot">
				<input type="hidden" name="nP" id="nP" value="<?php echo $mostrar2['nombre_Perfil'];?>">
				<input type="hidden" name="texto" id="texto" value="<?php echo $mostrar2['texto'];?>">
				<input type="hidden" name="nCap" id="nCap" value="<?php echo $_POST['nCap'];?>">
				<input type="submit" class="botonInicio" name="Cancelar reporte" value="Cancelar reporte">
				</form>
				<div>
					<form action="eliminarReseñaAdmin.php" method="post" onsubmit="confirm();" enctype="multipart/form-data">
						<input type="hidden" name="texto" id="texto" value="<?php echo $mostrar2['texto'];?>">
						<input type="submit" class="botonInicio" name="Eliminar" value="Eliminar">
					</form>
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