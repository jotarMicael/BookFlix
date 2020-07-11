<?php session_start(); 
include('conexion.php');
session_start();
	if ($_SESSION['actualizar']==0){
		$_SESSION['perfilImagen']= $_GET['img'];
		$_SESSION['perfilNombre']= $_GET['perfil'];
		$_SESSION['actualizar']=1;
	}
	
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Cargar Capitulo</title>
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
				<?php if (!empty($_SESSION['error'])){
    		echo $_SESSION['error'];
			unset($_SESSION['error']);} ?> </h3>
	</div>
			<h2 class="tituloSecundarioConfiguracion" >Ingrese los datos del capitulo</h2>
			<div class="divConfiguracion">
				  <div class="registroConfiguracion">
				  <form action="cargarCapituloLibro.php" method="post" enctype="multipart/form-data">
					<label class="labelWhite">ISBN del libro: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="ISBN" name="ISBN"><br>
					<label class="labelWhite">Nombre del capitulo: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="nCap" name="nCap"><br>
					<label class="labelWhite">Seleccionar pdf del capitulo: </label><br>
					<input type="file" class="redondeado" id="pdf" name="pdf" accept="application/pdf"><br>
					<input type="submit" class="boton" value="Ingresar"><br>
					</form>
				  </div>
				
		   	</div>
			<?php 
			
			
				if (isset($_POST['ISBN'])&&isset($_FILES['pdf'])&&isset($_POST['nCap'])){

					//Consulto en la bbdd si ya existe el capitulo que quiero ingresar
					$sql= "SELECT nombre_Capitulo FROM capitulo WHERE nombre_Capitulo = '".$_POST['nCap']."'";
					$result=mysqli_query($conexion,$sql);
					
						if(isset($_FILES['pdf'])){

							$nombre_pdf=$_FILES['pdf']['name'];
							$tipo_pdf=$_FILES['pdf']['type'];
							$tamagno_pdf=$_FILES['pdf']['size'];
	
							if ($tamagno_pdf<=1000000000000){
								if($tipo_pdf=='application/pdf'){
	
									//Ruta de la carpeta destino
									$carpeta_Destino=$_SERVER ['DOCUMENT_ROOT'].'/BookFlix/pdfs/';
									//Mover imagen del directorio temporal al directorio escogido
									move_uploaded_file($_FILES['pdf']['tmp_name'],$carpeta_Destino.$nombre_pdf);
									//header("Location: cargarLibro.php");
								}	
							}
							else{
	
								echo "<font color=white  size='5pt'> El tamaño del pdf es demasiado grande </font>";
							}
						}

						if(empty($nombre_pdf)){
							$_SESSION['error']='Se debe subir un pdf';
							header("Location: cargarCapituloLibro.php");
							exit;
						}
						else{
						$sql3="SELECT id_Libro,capitulos from libro WHERE ISBN ='" .$_POST['ISBN']."' ";
						$result3=mysqli_query($conexion,$sql3);
						$mostrar2=mysqli_fetch_array($result3, MYSQLI_ASSOC);
						$ideo=$mostrar2["id_Libro"];

						$sql5= "SELECT * FROM capitulo WHERE id_Libro='$ideo' ";
						$result5=mysqli_query($conexion,$sql5);

						if(empty($mostrar2['id_Libro'])){
							echo "<font color=white  size='5pt'> No existe libro con ese ISBN</font>";
							header("Location: cargarCapituloLibro.php");
							exit();
						}

						if(($mostrar2['capitulos'])==(mysqli_num_rows($result5))){
							$_SESSION['error']='Ya se encuentra cargado el permitido de capitulos para el libro';
							echo "<font color=white  size='5pt'> Ya se encuentra cargado el permitido de capitulos para el libro </font>";
							header("Location: cargarCapituloLibro.php");
							exit();
							
						}
						else{
						$sql3="SELECT id_Libro,capitulos from libro WHERE ISBN ='" .$_POST['ISBN']."' ";
						$result3=mysqli_query($conexion,$sql3);
						$mostrar2=mysqli_fetch_array($result3, MYSQLI_ASSOC);
						$ideo=$mostrar2["id_Libro"];

						

						if(empty($mostrar2['id_Libro'])){
							echo "<font color=white  size='5pt'> No existe libro con ese ISBN</font>";
							header("Location: cargarCapituloLibro.php");
						}
						else{
						$sql20= "SELECT nombre_Capitulo FROM capitulo WHERE nombre_Capitulo = '".$_POST['nCap']."' AND id_Libro='".$mostrar2['id_Libro']."' ";
						$result20=mysqli_query($conexion,$sql20);
						
						if(mysqli_num_rows($result20)>=1){
							$_SESSION['error']='El capitulo ya se encuentra cargado para este libro';
							echo "<font color=white  size='5pt'> El capitulo ya se encuentra cargado para este libro </font>";
							header("Location: cargarCapituloLibro.php");		
						}
						
						else{
						//ingreso el capitulo
						$sql2="INSERT INTO capitulo(nombre_Capitulo,id_Libro,pdf) VALUES ('".$_POST["nCap"]."','".$mostrar2["id_Libro"]."','$nombre_pdf')";
						$result2=mysqli_query($conexion,$sql2);
						echo "<font color=white  size='5pt'> El capitulo se ha cargado correctamente </font>";

						}
					}
					
					}
				}
					
					
				}
				
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>