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
        
        <?php $sql="SELECT fechaHora,nombre_Perfil from reseña where nombre_Capitulo = '" .$_POST['nCap']."' and texto = '" .$_POST['texto']."' ";
              $result=mysqli_query($conexion,$sql);
              echo $_POST['nCap'];
              echo $_POST['publish'];
              echo $_POST['nP'];
              while($mostrar=mysqli_fetch_array($result)){
              
                            ?>
	<div class="barraInicio">	
		<div class="divBotones"> 
		<a class="botonInicio" href="Home.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Inicio </a>
	    </div>		
	 </div>
	 <img class="imagenTitulo" src="Imagenes\Titulo.png">
			<div class="fondoComentarios">
				
				<div class="comentario">
	    			<div class="cuerpoComentario">
	    		<div class="barraTop-publicacion">
				<div>
					<input type="checkbox" name="spoiler" id="spoiler">Spoiler
				</div>
	    		<h5 class="textoBarraTop"><?php echo $mostrar['nombre_Perfil']; ?></h5>		
	    	</div>
	    	<div>
	    		<textarea cols="3" rows="5" class="contenido-publicacion" name="publish" id="publish"> <?php echo $_POST['texto'];?></textarea>
				
	    	</div>
	    	<div class="barraBot">
				<input type="hidden" name="nCap" id="nCap" value="<?php echo $_POST['nCap'];?>">
				<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_POST['idLibro'];?>">
				
	    	</div>
			
              <?php }?>
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
						$sql= "INSERT INTO reseña(fechaHora,nombre_Perfil,id_Libro,spoiler,nombre_Capitulo,texto) VALUES ('$fechaHora','".$_SESSION["perfilNombre"]."','".$_POST['idLibro']."','".$_POST['spoiler']."','".$_POST['nCap']."','" .$_POST["publish"]."')";
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