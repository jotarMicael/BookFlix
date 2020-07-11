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
	<title>Vista Previa</title>
	<style>
		body{background-color: #4642B8;padding: 15px;font-family: Arial;}
		
		#menu{
			background-color: #000;
			position: relative;
		
		}

		#menu ul{
			list-style: none;
			margin: 0;
			padding: 0;
		}

		#menu ul li{
			display: flex;
		}

		#menu ul li a{
			color: white;
			display: block;
			padding: 10px 5px;
			text-decoration: none;
		}

		#menu ul li a:hover{
			background-color: #42B881;
		}

		.item-r{
			float: right;
		}

		.nav li ul {
			display:none;
			position:absolute;
			min-width:140px;

		}
		.nav li:hover > ul{

			display:block;
		}
		.nav li ul li{
			position:absolute;
		}
		.nav li ul li ul{
			position:absolute;
			right: -140px;
			top: 0px;
		}
	</style>

</head>
<body background="Imagenes/2.jpg">
	<div id="menu" class="barraInicio">
			<div class="divBotones">
			<li><a href="Home.php?&perfil=<?php echo $_GET['perfil'];?>" class="botonInicio">Inicio</a></li>
			</div>
			<div class="divBotones">
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>
			<li><a class="botonInicio" href="miPerfil.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Mi Perfil</a></li>
				<?php }?>
		    </div>
		    <div class="divBotones">
		    	<img class="imagenBarraSuperior" src="Imagenes\TituloBarraSuperior.png">
		    </div>
		    
		    <div class="divBotones">
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>		
			<li><a class="botonInicio" href="Configuracion.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Configuracion</a></li>
			<?php }?>
			</div>
	</div>
	<div class="divLibrosRandom" style="margin-left: 25%;">
		<div class="divLibroVistaPrevia">
			<!-- Aca se van a tomar los datos del libro que pertenecen a otra tabla para ser mostrados en la vista previa del libro -->
		<?php 
		  	// Consulta para obtener autores del libro
		  $resultDos = mysqli_query($conexion, "SELECT nombre,apellido FROM autor INNER JOIN autoreslibro ON autor.id_Autor=autoreslibro.id_Autor WHERE id_Libro = '".$_GET['idLibro']."' ");
			// Consulta para obtener el genero 
		  $resultTres = mysqli_query($conexion, "SELECT nombre_Genero FROM genero INNER JOIN generopertenecelibro ON genero.id_Genero=generopertenecelibro.id_Genero WHERE id_Libro = '".$_GET['idLibro']."' ");
	    	// Consulta para obtener la editorial
		  $resultCuatro = mysqli_query($conexion, "SELECT nombre_Editorial,ISBN FROM libro INNER JOIN editorial ON libro.id_Editorial = editorial.id_Editorial WHERE libro.id_Libro = '".$_GET['idLibro']."' ");
			  // Consulta para obtener los capitulos de los libros
		  $resultCinco = mysqli_query($conexion, "SELECT nombre_Capitulo FROM capitulo INNER JOIN libro ON libro.id_Libro = capitulo.id_Libro WHERE libro.id_Libro = '".$_GET['idLibro']."' ");
		  
		  $sql="SELECT nombre_Editorial from editorial WHERE id_Editorial = '" .$_GET['idEdi']."'";

		  $result=mysqli_query($conexion,$sql);
			 ?>
		  
		  	<div>
			<image class="home" style="height: 475px; width:300px; border-radius: 20px;" width="100%" src="/BookFlix/Portadas/<?php echo  $_GET['libro']?>"/>
			</div>
			<div style="text-align: center; margin-left: 50px; margin-top: 30px;">
				<div class="divMargin">
			<label class="labelWhite">Titulo: </label>
			<label class="labelWhite"> <strong> <?php echo $_GET['titulo'] ?> </strong></label><br>
			</div>
			<div class="divMargin">
			<label class="labelWhite" >Autor/es: </label>
			<label class="labelWhite"> <strong> <?php while($mostrar=mysqli_fetch_array($resultDos)) {
				echo $mostrar['nombre'];?> <space> <?php echo $mostrar['apellido'].' ';
$ape=$mostrar['apellido'];
			}?> </strong></label> <br>
			</div>
			<div class="divMargin">
			<label class="labelWhite">Genero/s: </label>
			<label class="labelWhite"> <strong> <?php  while($mostrar2=mysqli_fetch_array($resultTres)) {
				echo $mostrar2['nombre_Genero'].' ';
				$gen=$mostrar2['nombre_Genero'];
				?>

			<?php } ?> </strong> </label><br>
			</div>
			<div class="divMargin">
			<label class="labelWhite">Editorial: </label>
			<label class="labelWhite"> <strong ><?php while($mostrar3=mysqli_fetch_array($resultCuatro)) {
				echo $mostrar3['nombre_Editorial']; echo"<br>";echo"<br>";
				 $ISBN = 'ISBN: ';
				echo $ISBN; echo $mostrar3['ISBN'];
$edi=$mostrar3['nombre_Editorial'];
			} ?> </strong> </label><br>
			</div>
			<div class="divMargin">
			<?php
				
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				
							
				$sql22="SELECT premium FROM libro WHERE id_Libro='".$_GET['idLibro']."' ";
				$result22=mysqli_query($conexion,$sql22);
				$mostrar22=mysqli_fetch_array($result22, MYSQLI_ASSOC);

				$sql23="SELECT validada FROM cuentausuariotipopremiun WHERE nombre_Usuario='".$_SESSION['usuario']['nombre_Usuario']."' ";
				$result23=mysqli_query($conexion,$sql23);
				$mostrar23=mysqli_fetch_array($result23, MYSQLI_ASSOC);
					
				


				if((($mostrar22['premium']=='Si')&&($mostrar23['validada']=='Si')||($mostrar23['validada']=='VB'))||($mostrar22['premium']=='No')||(mysqli_num_rows($result) ==1)){
			
				
			

			

			
			
			
			
			
			$n=1; while($mostrar4=mysqli_fetch_array($resultCinco)) {?>
			 <a href="detalleCapitulo.php?&idLibro=<?php echo $_GET['idLibro'];?>&nLibro=<?php echo $_GET['titulo'];?>&nCap=<?php echo $mostrar4['nombre_Capitulo'];?>" class="labelWhite"> Capitulo <?php echo $n; ?>: <strong> <?php
				 echo $mostrar4['nombre_Capitulo']."<br /> <br />"; $n= $n+1;?> 
				
			 </strong> <?php } ?> </a>

			 <?php     $sql2="SELECT sum(valor) FROM calificacion WHERE id_Libro='".$_GET['idLibro']."' AND nombre_Capitulo='' ";
							  $result2=mysqli_query($conexion,$sql2);

							  $sql4="SELECT id_Calificacion FROM calificacion WHERE id_Libro='".$_GET['idLibro']."' AND nombre_Capitulo='' ";
							  $result4=mysqli_query($conexion,$sql4);

							  foreach($result2 as $row)
							  $pr=($row['sum(valor)'])/(mysqli_num_rows($result4));

					   $sql10= "UPDATE libro SET puntaje = '$pr' WHERE id_Libro='".$_GET['idLibro']."' ";
					   $result9=mysqli_query($conexion,$sql10);
							 	  
	  				?>
			 <label class="labelWhite"> Este libro tiene una calificacion promedio de <strong><?php if(is_nan($pr)) $pr='(Sin calificaciones)'; echo round($pr,2);?></strong> puntos por los usuarios que lo han leido. </label><br><br>
		
			</div>
			<?php $sql3= "SELECT id_ListaDeseos FROM listadeseos WHERE id_Libro='".$_GET['idLibro']."' AND nombre_Perfil='".$_SESSION['perfilNombre']."' AND nombre_Libro='".$_GET['titulo']."' ";
				  $result3=mysqli_query($conexion,$sql3);
				  $result40= mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				  if(( mysqli_num_rows($result3) <> 1 )&&(mysqli_num_rows($result40) <> 1)){?>
					<form action="addLibroListaDeseos.php" method="post" enctype="multipart/form-data" >
					<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
					<input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>">
					<input type="hidden" name="titulo" id="titulo" value="<?php echo $_GET['titulo'];?>">
					<input type="hidden" name="libro" id="libro" value="<?php echo $_GET['libro'];?>">
					<input type="submit" class="boton" value="Agregar a lista de deseos" onclick="return ConfirmDemo()"><br> 
				 	</form>  
					 <br>
			 <?php }
			 else{
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) ==0){
				?>
				<h3 class="tituloSecundarioConfiguracion" > Ya posees este libro en tu lista de deseos </h3>
			 <?php }}?>
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 0){
					?>
			<?php $sql8= "SELECT id_Libro FROM perfilleyolibro WHERE id_Libro='".$_GET['idLibro']."' AND nombre_Perfil='".$_SESSION['perfilNombre']."'";
				  $result8=mysqli_query($conexion,$sql8);
				  if(mysqli_num_rows($result8) == 0){
			 ?>
			<div class="divMargin">
			<form action="finishBook.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			<input type="hidden" name="apellido" id="apellido" value="<?php echo $ape?>">
			<input type="hidden" name="editorial" id="editorial" value="<?php echo $edi?>">
			<input type="hidden" name="genero" id="genero" value="<?php echo $gen?>">
			<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			<input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>">
			<input type="hidden" name="titulo" id="titulo" value="<?php echo $_GET['titulo'];?>">
			<input type="hidden" name="libro" id="libro" value="<?php echo $_GET['libro'];?>">
			<input type="submit" class="boton" value="Finalizar Lectura" onclick="return ConfirmDemo()"><br> 
     		</form> 
			</div>
			<?php }else{
				$sql9= "SELECT id_Libro FROM calificacion WHERE id_Libro='".$_GET['idLibro']."' AND nombre_Perfil='".$_SESSION['perfilNombre']."'";
				$result8=mysqli_query($conexion,$sql9);
				if(mysqli_num_rows($result8) == 0){
				?>
				<div class="divMargin">
			<form action="crearCalificacion.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			<input type="submit" class="boton" value="Calificar" onclick="return ConfirmDemo()"><br> 
     		</form> 
			</div>
			<?php }
					?>
				<form action="crearReseña.php" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			<input type="submit" class="boton" onclick="return ConfirmDemo()" value="Dejar reseña"><br>
			</form>
            <br>;
			<form action="listarReseñasLibros.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			<input type="submit" class="boton" onclick="return ConfirmDemo()" value="Ver reseñas"><br> 
     		</form>  	
			<?php
					}
				}?>

			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 1){
					?>
			<div class="divMargin">
			 <a href="modificarLibro.php?&idLibro=<?php echo $_GET['idLibro'];?>&imagen=<?php echo $_GET['libro'];?>" class="labelWhite" onclick="return ConfirmDemo()"> <strong>Modificar libro </strong> </a>
			</div>
				<?php } 
						}
				else{?>
						<h3 class="tituloSecundarioConfiguracion" > ¡Contenido exclusivo solo para usuarios <a href="hacersePremium.php" class="boton">Premium!</a> </h3>
				<?php } ?>
			</div>
		</div>
		
	</div>
	

</body>
</html>