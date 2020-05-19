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
	</style>

</head>
<body background="Imagenes/2.jpg">

	<div id="menu" class="barraInicio">
			<div class="divBotones">
			<li><a href="#" class="botonInicio">Inicio</a></li>
			</div>
			<div class="divBotones">
			<li><a class="botonInicio" href="miPerfil.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Mi Perfil</a></li>
		    </div>
		    <div class="divBotones">
		    	<img class="imagenBarraSuperior" src="Imagenes\TituloBarraSuperior.png">
		    </div>
		    <div class="divBotones">
			<label class="labelWhite">Buscar: </label>
			<input type="text" class="redondeado" autocomplete="on" id="libro" name="libro">
		    </div>
		    <div class="divBotones">
			<li><a class="botonInicio" href="Configuracion.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Configuracion</a></li>
			</div>
			<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) == 1){
					?>
					<li><a href="cargarLibros.php">Cargar Libros</a></li>;
				<?php
				}
			?>
	</div>	
	</div>

				<div class="divLibrosRandom">
				<div class="divLibro">
					<img class="imagenPortada" src="Imagenes\Portada3.jpg"><br><br>
					<label class="labelWhite"> Bajo la misma estrella </label>
				</div>
				<div class="divLibro">
					<img class="imagenPortada" src="Imagenes\Portada3.jpg"><br><br>
					<label class="labelWhite"> Bajo la misma estrella </label>
				</div>
				<div class="divLibro">
					<img class="imagenPortada" src="Imagenes\Portada3.jpg"><br><br>
					<label class="labelWhite"> Bajo la misma estrella </label>
				</div>
				<div class="divLibro">
					<img class="imagenPortada" src="Imagenes\Portada3.jpg"><br><br>
					<label class="labelWhite"> Bajo la misma estrella </label>
				</div>
				<div class="divLibro">
					<img class="imagenPortada" src="Imagenes\Portada3.jpg"><br><br>
					<label class="labelWhite"> Bajo la misma estrella </label>
				</div>
				<div class="divLibro">
					<img class="imagenPortada" src="Imagenes\Portada3.jpg"><br><br>
					<label class="labelWhite"> Bajo la misma estrella </label>
				</div>
				</div>
				<!--En esta parte del codigo hay que consultar a la base de datos todos los libros que tiene cargados, y mostrarlos como un link. Ese link debe redireccionar al libro en concreto-->
						<?php 
							$sql="SELECT * from libros";
							$result=mysqli_query($conexion,$sql);

							while($mostrar=mysqli_fetch_array($result)){
						?>
						<tr>
							<td><?php echo $mostrar['portada'] ?></td>
							<td><?php echo $mostrar['nombre'] ?></td>
					
						</tr>
						<?php 
							}
						 ?>
    
</body>
</html>