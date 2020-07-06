<?php session_start(); 
include('conexion.php');
date_default_timezone_set('America/Argentina/Jujuy');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Crear Reseña</title>
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
			<h2 class="tituloSecundarioConfiguracion" >Ingrese la reseña</h2>
			<div class="fondoComentarios">
				<form action="crearReseña.php" method="post" onsubmit="return validar();" enctype="multipart/form-data">
				<div class="comentario">
	    			<div class="cuerpoComentario">
	    		<div class="barraTop-publicacion">
				<div>
					<input type="checkbox" name="spoiler" id="spoiler">Spoiler
				</div>
	    		<h5 class="textoBarraTop"><?php echo $_SESSION['perfilNombre']; ?></h5>		
	    	</div>
	    	<div>
	    		<textarea cols="3" rows="5" class="contenido-publicacion" name="publish" id="publish"></textarea>
				
	    	</div>
	    	<div class="barraBot">
				<input type="hidden" name="nCap" id="nCap" value="<?php echo $_POST['nCap'];?>">
				<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_POST['idLibro'];?>">
	    		<input type="submit" class="botonInicio" name="Publicar" value="Publicar">
				</form>
	    	</div>
			
	    
	</div>
	</form>	
				
		   	</div>
			<?php 
				
				if (!empty($_POST['publish'])){
						if (empty($_POST['spoiler']))
							$_POST['spoiler']='No';
						else
							$_POST['spoiler']='Si';

						$fechaHora=date('Y-m-d g:ia');
						$sql= "INSERT INTO reseña(fechaHora,nombre_Perfil,id_Libro,spoiler,nombre_Capitulo,texto,reportada) VALUES ('$fechaHora','".$_SESSION["perfilNombre"]."','".$_POST['idLibro']."','".$_POST['spoiler']."','".$_POST['nCap']."','" .$_POST["publish"].",'No')";
						$result=mysqli_query($conexion,$sql);
						$_SESSION['error']='La reseña se ha cargado correctamente';
						header('Location: home.php');

					
				}
				else
					echo 'Debe ingresar un texto';
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>