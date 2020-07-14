<?php
	session_start();
	if ($_SESSION['actualizar']==0){
		$_SESSION['perfilImagen']= $_GET['img'];
		$_SESSION['perfilNombre']= $_GET['perfil'];
		$_SESSION['actualizar']=1;
	}
	
?>
<!DOCTYPE html>
<html>
<head >
	<title>Inicio</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg"> 
	<script type="text/javascript" src="scriptRegistro.js"></script>
	<script type="text/javascript" src="scriptConfirm.js"></script>
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
	<?php
		include('conexion.php');
	?>
	<?php
		if (empty($_SESSION['usuario'])) {
			header('Location: index.php');
			exit;}
		if (!empty($_SESSION['error'])) {
			echo "<font color=white  size='5pt'> ".$_SESSION['error']." </font>";
			unset($_SESSION['error']);
		}
 		?>
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
	</div>
	<?php
		if (!empty($_SESSION['error'])) {
			echo "<font color=white  size='5pt'> ".$_SESSION['error']." </font>";
			unset($_SESSION['error']);
		}
 		?>
		<div>
		<a class="botonInicio" href="ultimosLibrosAñadidos.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Ultimos libros añadidos</a></li>  &nbsp
		<a class="botonInicio" href="librosMasPopulares.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Libros mas populares</a></li>  &nbsp
		<a class="botonInicio" href="librosMasLeidos.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Libros mas leidos</a></li>
				<div class="divLibrosRandom" style="width:1120px; hight:auto; display: flex;">
						<?php 
							$actual=date('Y-m-d');
							$sql="SELECT imagenTapaLibro,nombre_Libro,id_Editorial,id_Libro,fecha_DeBaja,fecha_DeBaja2 from libro ORDER BY RAND()";
							$result=mysqli_query($conexion,$sql);
							
							$sql30="SELECT nombre_Usuario from cuentausuariotipopremiun where nombre_Usuario= '".$_SESSION['usuario']['nombre_Usuario']."'";
							$result30=mysqli_query($conexion,$sql30);
							if(mysqli_num_rows($result30) == 1)
								$mostrar['fecha_DeBaja']=$mostrar['fecha_DeBaja2'];	
								
							while($mostrar=mysqli_fetch_array($result)){
								if(($mostrar['fecha_DeBaja'])>($actual)){
						?>
							<div class="divLibro">
								<a href="#"><image width="80%" src="/BookFlix/Portadas/<?php echo $mostrar['imagenTapaLibro'];?>"/></a><br><br>
								<br>
								<td> <a class="labelWhite" href="vistaPrevia.php?&libro=<?php echo $mostrar['imagenTapaLibro'];?>&titulo=<?php echo $mostrar['nombre_Libro'];?>&autor=<?php echo $mostrar['autor'];?>&idEdi=<?php echo $mostrar['id_Editorial'];?>&genero=<?php echo $mostrar['genero'];?>&idLibro=<?php echo $mostrar['id_Libro'];?>&perfil=<?php echo $_GET['perfil'];?>"> <strong><?php echo $mostrar['nombre_Libro'];?> </strong> </a></td> <br> &nbsp;
								<br>
								<br>
							</div>
						<?php 
							 } } 
						 ?>
				</div>
				
				<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 1){
					?>          
				<div style="margin-right: -1px; margin-top: 20px; position: relative; z-index: 1;" class="divNotificaciones">
				<label class="labelWhite">Autores mas leidos: </label><br><br>
				<?php 
							$sql11="SELECT nombre,apellido,leido FROM autor GROUP BY apellido ORDER BY leido DESC LIMIT 3 ";
							$result11=mysqli_query($conexion,$sql11);
							while($mostrar11=mysqli_fetch_array($result11))	{		
						  ?>
							<div class="cuerpoComentario">
								<label class="labelWhite"> <?php echo $mostrar11['nombre']; echo ' '; echo $mostrar11['apellido'];echo ' '; echo 'con';echo ' '; echo $mostrar11['leido'];echo ' '; echo 'leidos' ?></label><br><br>
							</div>
							<?php } ?>
				</div>
				<?php } ?>
				<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 1){
					?>
				<div style="margin-right: -1px; margin-top: 20px; position: relative; z-index: 1;" class="divNotificaciones">
				<label class="labelWhite">Editoriales mas leidas: </label><br><br>
				<?php 
							$sql11="SELECT nombre_Editorial,leido FROM editorial GROUP BY nombre_Editorial ORDER BY leido DESC LIMIT 3 ";
							$result11=mysqli_query($conexion,$sql11);
							while($mostrar11=mysqli_fetch_array($result11))	{		
						  ?>
							<div class="cuerpoComentario">
								<label class="labelWhite"> <?php echo $mostrar11['nombre_Editorial']; echo ' '; echo 'con';echo ' '; echo $mostrar11['leido'];echo ' '; echo 'leidos' ?></label><br><br>
							</div>
							<?php } ?>
				</div>
				<?php } ?>
				<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 1){
					?>
				<div style="margin-right: -1px; margin-top: 20px; position: relative; z-index: 1;" class="divNotificaciones">
				<label class="labelWhite">Generos mas leidos: </label><br><br>
				<?php 
							$sql11="SELECT nombre_Genero,leido FROM genero GROUP BY nombre_Genero ORDER BY leido DESC LIMIT 3 ";
							$result11=mysqli_query($conexion,$sql11);
							while($mostrar11=mysqli_fetch_array($result11))	{		
						  ?>
							<div class="cuerpoComentario">
								<label class="labelWhite"> <?php echo $mostrar11['nombre_Genero']; echo ' '; echo 'con';echo ' '; echo $mostrar11['leido'];echo ' '; echo 'leidos' ?></label><br><br>
							</div>
							<?php } ?>
				</div>
				<?php } ?>
							<div style="margin-right: -1px; margin-top: 20px; position: relative; z-index: 1;" class="divNotificaciones">
	<?php 
							$sql="SELECT * from noticia ";
							$result=mysqli_query($conexion,$sql);
							while($mostrar=mysqli_fetch_array($result)){
						?>
								<div class="cuerpoComentario">
									<div class="barraTop-publicacion">
									<label class="labelWhite"> <?php echo $mostrar['fecha'];?></label><br><br>
									</div>
									<div>
	    								<label class="labelWhite"><?php echo $mostrar['texto'];?></label>
	    							</div>
	    							<div class="barraBot">
									<?php $resultado = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
											if(mysqli_num_rows($resultado) == 1){ ?>
	    										<li><a class="botonInicio" href="eliminarNoticia.php?idNoti=<?php echo $mostrar['id_Noticia']?>" onclick="return ConfirmDemo()">Eliminar Noticia</a></li>
												<li><a class="botonInicio" href="modificarNoticia.php?idNoti=<?php echo $mostrar['id_Noticia']?>"onclick=" return ConfirmDemo()">Modificar Noticia</a></li>
									<?php }?>
	    							</div>
											
								</div>
								

							<?php }
							?>
				</div>
		</div>
				<div style="margin-right: 2px; text-align: right;">
				<h2 class="tituloSecundarioConfiguracion" >¡Nuevos Trailers!</h2></div>
				<?php $sql6="SELECT * from trailer  ORDER BY RAND()
					LIMIT 3 ";
				$result6=mysqli_query($conexion,$sql6);

				while($mostrar6=mysqli_fetch_array($result6)){
					$sql="SELECT imagenTapaLibro,nombre_Libro,id_Editorial,id_Libro,fecha_DeBaja from libro where id_Libro = '".$mostrar6['id_Libro']."'";
					$result=mysqli_query($conexion,$sql);
					$mostrar=mysqli_fetch_array($result, MYSQLI_ASSOC);
					$option=$mostrar6['archivo_Trailer'];
					$porcion= explode(".",$option);
					if(($porcion[1]=="mp4")||($porcion[1]=="flv")||($porcion[1]=="h264")||($porcion[1]=="divx")){
				 ?>
				 <div style="margin-right: 2px" class="registroConfiguracion">
						<video width="270" height="240" controls>
  						<source src="/BookFlix/Archivos/<?php echo $mostrar6['archivo_Trailer'];?>" type="video/mp4">
						Your browser does not support the video tag.
						</video> 	
						
						<td> <a class="labelWhite" href="vistaPrevia.php?&libro=<?php echo $mostrar['imagenTapaLibro'];?>&titulo=<?php echo $mostrar['nombre_Libro'];?>&autor=<?php echo $mostrar['autor'];?>&idEdi=<?php echo $mostrar['id_Editorial'];?>&genero=<?php echo $mostrar['genero'];?>&idLibro=<?php echo $mostrar['id_Libro'];?>&perfil=<?php echo $_GET['perfil'];?>"> <strong> <?php  echo $mostrar6['titulo'];  ?> </strong> </a></td> <br> &nbsp;	
						<br>
						<td> <font color="white"> Libro: <strong> <?php  echo $mostrar['nombre_Libro']; ?> </strong> </font> </td> <br> &nbsp;
						<br>	
						<td>  <font color=white> <strong> <?php  echo $mostrar6['descripcion'];  ?> </strong> </font> </td> <br> &nbsp;	
										
				<?php } 
						else{ ?>
								<a href="#"><image src="/BookFlix/Archivos/<?php echo $mostrar6['archivo_Trailer'];?> " width="15%"/></a><br><br>
								<br>
								<td> <a href="vistaPrevia.php?&libro=<?php echo $mostrar['imagenTapaLibro'];?>&titulo=<?php echo $mostrar['nombre_Libro'];?>&autor=<?php echo $mostrar['autor'];?>&idEdi=<?php echo $mostrar['id_Editorial'];?>&genero=<?php echo $mostrar['genero'];?>&idLibro=<?php echo $mostrar['id_Libro'];?>&perfil=<?php echo $_GET['perfil'];?>"> <strong> <?php  echo $mostrar6['titulo'];  ?> </strong> </a></td> <br> &nbsp;
								<br>
								<td>  <font color="white"> <strong> <?php  echo $mostrar6['descripcion'];  ?> </strong> </font> </td> <br> &nbsp;	
								<td>  <font color="white"> <strong> <?php  echo $mostrar['nombre_Libro']; ?> </strong> </font> </td> <br> &nbsp;	
								<br>
								<br>
						<?php } ?>
						</div>
						<?php $resultado10 = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
								if(mysqli_num_rows($resultado10) == 1){ ?>
	    								<li><a class="botonInicio" onclick="return ConfirmDemo()" href="eliminarTrailer.php?archivo=<?php echo $mostrar6['archivo_Trailer'];?>">Eliminar Trailer</a></li>
				</div>	
					<?php } }?>	
						

</body>
</html>