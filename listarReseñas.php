<?php session_start();
 include('conexion.php');
 if (!empty($_SESSION['error'])) {
	echo "<font color=white  size='5pt'> ".$_SESSION['error']." </font>";
	unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity=" sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="all.css" rel="stylesheet" type="text/css">
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<script type="text/javascript" src="scriptMostrar.js"></script>
	<script type="text/javascript">
function ConfirmDemo() {
//Ingresamos un mensaje a mostrar
var mensaje = confirm("¿Estas seguro de realizar dicha accion?");
//Detectamos si el usuario acepto el mensaje
if (mensaje) {

return true;
}
//Detectamos si el usuario denegó el mensaje
else {

return false;
}
}
</script>
	
	<title>Reseñas</title>
</head>
<body background="Imagenes/2.jpg">
	<img src="Imagenes/Titulo.png" class="imagenTituloRegistro">
	<h2 class="tituloSecundarioConfiguracion" >Reseñas realizadas por otros usuarios...</h2>
				
						<?php 
							$sql2="SELECT fechaHora,id_Perfil,texto,spoiler FROM reseña where id_Libro = '" .$_POST['idLibro']."' AND nombre_Capitulo='" .$_POST['nCap']."' AND reportada='No' ";
							$result2=mysqli_query($conexion,$sql2);
							if(mysqli_num_rows($result2)==0){ ?>
								<h2 class="tituloSecundarioConfiguracion" >Todavia no hay reseñas realizadas</h2>;
							<?php }
						else{
							

							while($mostrar2=mysqli_fetch_array($result2)){
								$sql25="SELECT nombre_Perfil FROM perfil WHERE id_Perfil='" .$mostrar2['id_Perfil']."' ";
								$result25=mysqli_query($conexion,$sql25);
								$mostrar25=mysqli_fetch_array($result25, MYSQLI_ASSOC);


								if(($mostrar2['spoiler'])=='Si'){
						?>
			
				<div class="fondoComentarios">
				<div class="comentario">
	    			<div class="cuerpoComentario">
	    		<div class="barraTop-publicacion">
				<h5 class="textoBarraTop">Ver spoiler...</h5>
				<input class="form-check-input" type="checkbox" id="check" name="check" value="Ver spoiler" onclick="mostrarInput()">			
				<div>
                <h5 class="textoBarraTop"><?php echo $mostrar2['fechaHora']; ?></h5>	
				</div >
	    		<h5 class="textoBarraTop"><?php echo $mostrar25['nombre_Perfil']; ?></h5>		
	    	</div>
	    	<div  id="content22" style="display:none">
				<form action="detalleComentario.php" method="post" enctype="multipart/form-data">
	    		<textarea disabled maxlength="80" cols="10" rows="10" class="contenido-publicacion" name="publish" id="publish"><?php echo substr($mostrar2['texto'], 0, 80); ?></textarea>
	    	</div>
			
	    	<div class="barraBot">
				<input type="hidden" name="nP" id="nP" value="<?php echo $mostrar25['nombre_Perfil'];?>">
				<input type="hidden" name="texto" id="texto" value="<?php echo $mostrar2['texto'];?>">
				<input type="hidden" name="nCap" id="nCap" value="<?php echo $_POST['nCap'];?>">
				<input type="submit" class="botonInicio" name="Ver mas..." value="Ver mas..." onclick="return ConfirmDemo();">
				</form>
			<div>
			<div>
					
			</div>
				
	    	
            </div>
			</div>
			</div>
			</div>
			
						<?php 
							 }
							else{
								
						 ?>
				<div class="fondoComentarios">
				<div class="comentario">
	    			<div class="cuerpoComentario">
	    		<div class="barraTop-publicacion">
				<div>
                <h5 class="textoBarraTop"><?php echo $mostrar2['fechaHora']; ?></h5>	
				</div >
	    		<h5 class="textoBarraTop"><?php echo $mostrar25['nombre_Perfil']; ?></h5>		
	    	</div>
	    	<div>
				<form action="detalleComentario.php" method="post" onsubmit="confirm();" enctype="multipart/form-data">
	    		<textarea disabled maxlength="80" class="contenido-publicacion" name="publish" id="publish"><?php echo substr($mostrar2['texto'], 0, 80); ?></textarea>
	    	</div>
	    	<div class="barraBot">
				<input type="hidden" name="nP" id="nP" value="<?php echo $mostrar25['nombre_Perfil'];?>">
				<input type="hidden" name="texto" id="texto" value="<?php echo $mostrar2['texto'];?>">
				<input type="hidden" name="nCap" id="nCap" value="<?php echo $_POST['nCap'];?>">
				<input type="submit" class="botonInicio" name="Ver mas..." value="Ver mas...">
				</form>
				<div>
					<form action="reportarReseña.php" method="post" onsubmit="confirm();" enctype="multipart/form-data">
						<input type="hidden" name="texto" id="texto" value="<?php echo $mostrar2['texto'];?>">
						<input type="submit" class="botonInicio" name="Reportar" value="Reportar">
					</form>
				</div>
				
	    	</div>
            </div>
			</div>
			<?php 
				}
			}
		}				
			  ?>
			</div>
				 

				
	
	  <div class="barraFin">
		<p class="textoBarra"> Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Gallardo Ucero Valentin </p>
    </div>
</body>
</html>