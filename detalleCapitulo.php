<?php session_start(); 
include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<script type="text/javascript" src="scriptMostrar.js"></script>
	<script type="text/javascript">
function ConfirmDemo(); {
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
	<title>Detalle Del Capitulo</title>
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
<body background= "Imagenes/2.jpg">
	<div id="menu" class="barraInicio">
			<div class="divBotones">
			<li><a href="Home.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>" class="botonInicio">Inicio</a></li>
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
			<form action="Busqueda.php" method="POST" enctype="multipart/form-data">
		<div style="display: flex;">
			<div>
			<label class="labelWhite">Autor/es: </label><br>
					<select name="nombreCompletoAutor" id="nombreCompletoAutor">
					<option value="Todos">Todos</option>
						<?php 
							$sql= "SELECT nombre,apellido FROM autor";
							$result=mysqli_query($conexion,$sql);
							if( mysqli_num_rows($result) == 0 )
								echo " No hay ningun autor creado";
							else {
							
							while($mostrar=mysqli_fetch_array($result)){
						?>
						
						<option> <?php echo  $mostrar ['nombre'] ." ". $mostrar['apellido'] ?> </option>

						<?php 
							}
							
						}
						?>
					</select> <br>
			</div>
			<div>
					<label class="labelWhite">Genero: </label><br>
					<select name="genero" id="genero" > 
					<option value="Todos">Todos</option>
						<?php 
							$sql= "SELECT nombre_Genero FROM genero";
							$result=mysqli_query($conexion,$sql);
							if( mysqli_num_rows($result) == 0 )
								echo " No hay ningun genero creado";
							else {

							while($mostrar=mysqli_fetch_array($result)){
						?>
						
						<option> <?php echo  $mostrar ['nombre_Genero'] ?> </option>

						<?php 
							}
						}
						?>
					</select>
			</div>
			<div>
					<label class="labelWhite">Editorial: </label><br>
					<select name="nombreEditorial" id="nombreEditorial" >
					<option value="Todos">Todos</option>
						<?php 
							$sql= "SELECT nombre_Editorial FROM editorial";
							$result=mysqli_query($conexion,$sql);
							if( mysqli_num_rows($result) == 0 )
								echo " No hay ninguna editorial creada";
							else {

							while($mostrar=mysqli_fetch_array($result)){
						?>
						<option> <?php echo $mostrar ['nombre_Editorial']; ?> </option>;
						

						<?php 
							}
						}
						?>
					</select> <br> 
			</div>
			<div style="margin-left: 10px; margin-top: 17px;">
         		 <input class="text" type="search" name="busca" autofocus  size="18" autocomplete="on" >

         		 <input type="submit" class="botonInicio" value="Buscar"></a>
         	</div>
         </div>
        	</form>
		    </div>
			<div class="divBotones">
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>
			<li><a class="botonInicio" href="Configuracion.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Configuracion</a></li>
			<?php }?>
			</div>
			<div class="divBotones">
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>
			<li><a href="verYCrearPerfiles.php" class="botonInicio">Cambiar de perfil</a></li>
				<?php }?>
			</div>
			<div class="divBotones">
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				$result2 = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentausuariotipopremiun WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if((mysqli_num_rows($result) <> 1)&&(mysqli_num_rows($result2) <> 1)){
					?>
			<li><a href="hacersePremium.php" class="botonInicio">¡Hazte Premium!</a></li>
				<?php }?>
			</div>
			<div class="divBotones">
			<li><a href="cerrarSesion.php" class="botonInicio">Cerrar Sesión</a></li>
			</div>
				
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 1){
					?>
					<div style="margin-top: 10px;">
					<li><a href="acceptPremiun.php" class="botonInicio">Peticiones a premium</a></li>
					</div>
					<div style="position: relative; z-index: 3;">
					<ul class="nav">
						<li><a class="botonInicio" href="" >Administrar datos</a>
					
						<ul>
							<a class="botonInicio" href="cargarLibro.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Libro</a></li>
							<a class="botonInicio" href="cargarCapituloLibro.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Capitulo</a></li>
							<a class="botonInicio" href="cargarAutor.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Autor</a></li>
							<a class="botonInicio" href="cargarGenero.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Genero</a></li>
							<a class="botonInicio" href="cargarNoticia.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Noticia</a></li>
							<a class="botonInicio" href="cargarEditorial.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Editorial</a></li>
							<a class="botonInicio" href="cargarTrailer.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Trailer</a></li>
							<a class="botonInicio" href="ListarTrailers.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Listar Trailers</a></li>
							<a class="botonInicio" href="ListarLibros.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Listar Libros</a></li>
							<a class="botonInicio" href="editarAutor.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Editar Autor</a></li>
							<a class="botonInicio" href="deleteGenero.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Eliminar Genero</a></li>
							<a class="botonInicio" href="deleteAutor.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Eliminar Autor</a></li>
							<a class="botonInicio" href="deleteEditorial.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Eliminar Editorial</a></li>
							<a class="botonInicio" href="deleteLibro.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Eliminar Libro</a></li>
							<a class="botonInicio" href="deleteCapitulo.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Eliminar Capitulo</a></li>
							<a class="botonInicio" href="listarReportes.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Listar Reportes</a></li>
							<a class="botonInicio" href="listarCuentasTS.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Listar expiracion de cuentas</a></li>
						</ul>
						</li>
							
					
					</ul>

				<?php
				}
			?>
			
				</div>	
				<h3 class="tituloTerciarioConfiguracion">
		<?php if (!empty($_SESSION['error'])){
    		echo $_SESSION['error'];
			unset($_SESSION['error']);} ?> </h3>
	</div>
	 <img class="imagenTitulo" src="Imagenes\Titulo.png">
			<h2 class="tituloSecundarioConfiguracion" > Nombre: "<?php echo $_GET["nCap"]?>" </h2>
			<div class="divConfiguracion">
				
				  <div class="registroConfiguracion">
					<?php     $sql2="SELECT sum(valor) FROM calificacion WHERE id_Libro='".$_GET['idLibro']."' AND nombre_Capitulo='".$_GET['nCap']."' ";
							  $result2=mysqli_query($conexion,$sql2);

							  $sql4="SELECT id_Calificacion FROM calificacion WHERE id_Libro='".$_GET['idLibro']."' AND nombre_Capitulo='".$_GET['nCap']."' ";
							  $result4=mysqli_query($conexion,$sql4);

							  foreach($result2 as $row)
							  $pr=($row['sum(valor)'])/(mysqli_num_rows($result4))
							 
							  
	  				?>
					<label class="labelWhite"> Este capitulo tiene una recomendacion promedio de <strong><?php if(is_nan($pr)) $pr='(Sin calificaciones)'; echo round($pr,2);?></strong> puntos por los usuarios que lo han leido. </label><br><br>
					<a href="leerLibro.php?&idLibro=<?php echo $_GET['idLibro'];?>&perfil=<?php echo $_GET['perfil'];?>&nCap=<?php echo $_GET['nCap'];?>" class="labelWhite"><strong> Leer: <?php
				 echo $_GET['nCap']."<br /> <br />"?></strong></a>
					
				  
				  
				
		   	</div>
			   </div>
				  <div class="divMargin">
			 <br> <br>
			 <?php 
			 	  $sql4= "SELECT id_ListaDeseos FROM listadeseos WHERE nombre_Libro='".$_GET['nLibro']."' AND id_Libro='".$_GET['idLibro']."' AND nombre_Perfil='".$_SESSION['perfilNombre']."' ";
				  $result4=mysqli_query($conexion,$sql4);
				  if( mysqli_num_rows($result4) == 1 ){
			 ?>	
			 	 <h3 class="tituloSecundarioConfiguracion" > Ya posees el libro completo en tu lista de deseos </h3>;
				  <?php }
				  else {	
			 	  $sql3= "SELECT id_ListaDeseos FROM listadeseos WHERE nombre_Capitulo= '".$_GET['nCap']."' AND id_Libro='".$_GET['idLibro']."' AND nombre_Perfil='".$_SESSION['perfilNombre']."' ";
				  $result3=mysqli_query($conexion,$sql3);
				  if( mysqli_num_rows($result3) <> 1 ){?>
					<form action="addListaDeseos.php" method="post" enctype="multipart/form-data" >
					<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
					<input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>">
					<input type="submit" class="boton" value="Agregar a lista de deseos"><br> 
				 	</form>  
					 <br>
			 <?php }
			 else{
				?>
				<h3 class="tituloSecundarioConfiguracion" > Ya posees este capitulo en tu lista de deseos </h3>
			 <?php }
			 }?>
				
				  
			 <form action="listarReseñas.php" method="post" enctype="multipart/form-data" onclick="ConfirmDemo();">
			 <input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			<input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>">
			<input type="submit" class="boton" value="Ver reseñas"><br> 
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
			<form action="finishCap.php?&nCap=<?php echo $_GET['nCap'];?>&perfil=<?php echo $_GET['perfil'];?>" method="post" enctype="multipart/form-data" onclick="ConfirmDemo();">
			<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			<input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>">
			<input type="hidden" name="nLibro" id="nLibro" value="<?php echo $_GET['nLibro'];?>">
			<input type="submit" class="boton" onclick="ConfirmDemo();" value="Finalizar lectura"><br> 
     		</form> 
			</div>
			<?php }
			else{
				if(mysqli_num_rows($result) == 0){
			?>
			<form action="crearReseña.php" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			<input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>">
			<input type="submit" class="boton" value="Dejar reseña"><br> 
			<?php $sql9= "SELECT id_Libro FROM calificacion WHERE id_Libro='".$_GET['idLibro']."' AND nombre_Perfil='".$_SESSION['perfilNombre']."' AND nombre_Capitulo='".$_GET['nCap']."' ";
				$result8=mysqli_query($conexion,$sql9);
				if(mysqli_num_rows($result8) == 0){
			
			?>
     		</form>
			 <div class="divMargin">
			 <br> <br>
			 <form action="crearCalificacion.php" method="post" enctype="multipart/form-data" onclick="ConfirmDemo();;">
			 <input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			 <input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>"> 
			 <input type="submit" class="boton" value="Calificar"><br> 
     		 </form> 
			 </div>
			 <?php } } } ?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>