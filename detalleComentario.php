<?php session_start(); 
include('conexion.php');
date_default_timezone_set('America/Argentina/Jujuy');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Comentarios</title>
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
     <?php $sql="SELECT fechaHora,nombre_Perfil from reseña where nombre_Capitulo = '" .$_POST['nCap']."' and texto = '" .$_POST['texto']."' ";
              $result=mysqli_query($conexion,$sql);
              while($mostrar=mysqli_fetch_array($result)){
              
                            ?>
			<div class="fondoComentarios">
				
				<div class="comentario">
	    			<div class="cuerpoComentario">
	    		<div class="barraTop-publicacion">
				<div>
                <h5 class="textoBarraTop"><?php echo $mostrar['fechaHora']; ?></h5>
				</div>
	    		<h5 class="textoBarraTop"><?php echo $mostrar['nombre_Perfil']; ?></h5>		
	    	</div>
	    	<div>
	    		<textarea disabled class="contenido-publicacion" name="publish" id="publish"> <?php echo $_POST['texto'];?></textarea>
	    	</div>
	    	<div class="barraBot">
				<input type="hidden" name="nCap" id="nCap" value="<?php echo $_POST['nCap'];?>">
				<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_POST['idLibro'];?>">
                <h5 class="textoBarraTop">Comentario completo</h5>	
	    	</div>
			
              
	</div>			
		   	</div>
			
     </div>
     <?php }?>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>