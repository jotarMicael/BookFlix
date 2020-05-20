<?php
	session_start();
		$_SESSION['perfilImagen']= $_GET['img'];
		$_SESSION['perfilNombre']= $_GET['perfil'];
	
	
	if (!empty($_SESSION['error'])) {
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	}
?>
<!DOCTYPE html>
<html>
<head >
	<title>Inicio</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg"> 
	<script type="text/javascript" src="scriptRegistro.js"></script>
	<?php
		include('conexion.php');
	?>
	<?php
		if (empty($_SESSION['usuario'])) {
			header('Location: index.php');
			exit;}
		if (!empty($_SESSION['error'])){
			echo $_SESSION['error'];
			unset($_SESSION['error']);}
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
			<li><a href="Home.php" class="botonInicio">Inicio</a></li>
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
			<label class="labelWhite">Buscar: </label>
			<input type="text" class="redondeado" autocomplete="on" id="libro" name="libro">
			
		    </div>
			<div class="divBotones">
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>
			<li><a class="botonInicio" href="Configuracion.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Configuracion</a></li>
			<?php }?>
			</div>
				
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 1){
					?>
					<ul class="nav">
						<li><a class="botonInicio" href="" >Administrar datos</a>
					
						<ul>
							<a class="botonInicio" href="cargarLibro.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Libro</a></li>
							<a class="botonInicio" href="cargarAutor.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Autor</a></li>
							<a class="botonInicio" href="cargarGenero.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Genero</a></li>
							<a class="botonInicio" href="cargarNoticia.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Cargar Noticia</a></li>
						</ul>
						</li>
							
					
					
					</ul>

				<?php
				}
			?>	
	</div>
				<div class="divLibrosRandom">
						<?php 
							$sql="SELECT imagenTapaLibro,nombre_Libro,autor from libro ";
							$result=mysqli_query($conexion,$sql);
							while($mostrar=mysqli_fetch_array($result)){
						?>
							<div class="divLibro">
								<a href="#"><image width="80%" src="/BookFlix/Portadas/<?php echo $mostrar['imagenTapaLibro'];?>"/></a><br><br>
								<br>
								<td> <a href="vistaPrevia.php?libro=<?php echo $mostrar['imagenTapaLibro'];?>&perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> <strong><?php echo $mostrar['nombre_Libro'];?> </strong> </a></td> <br> &nbsp;
								<br>
								<?php echo $mostrar['autor'];?>
								
						<br>
							</div>
						<?php 
							} 
						 ?>
				</div>
	<?php 
							$sql="SELECT * from noticia ";
							$result=mysqli_query($conexion,$sql);
							while($mostrar=mysqli_fetch_array($result)){
						?>
								<div class="cuerpoComentario">
									
									<a > <?php echo $mostrar['texto'];?></a><br><br>
									<a > <?php echo $mostrar['fecha'];?></a><br><br>
									<a > <?php echo $mostrar['id_Noticia'];?></a><br><br>
								
								</div>
									<li><a class="botonInicio" href="eliminarNoticia.php?idNoti=<?php echo $mostrar['id_Noticia']?>">Eliminar Noticia</a></li>
									<li><a class="botonInicio" href="Home.php?idNoti=<?php echo $mostrar['id_Noticia']?>">Modificar Noticia</a></li>
							<?php }
							?>
</body>
</html>