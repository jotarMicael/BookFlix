<?php
	session_start();

	if (!empty($_SESSION['error'])) {
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	}
?>
<!DOCTYPE html>
<html>
<head >
	<title>Perfiles</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg"> 
	<script type="text/javascript" src="scriptRegistro.js"></script>
	<?php
		include('conexion.php');
		if ($conexion){
			echo "Conexion exitosa";
		}
		else {
			echo "Conexion Fallida";
		}

	?>
</head>
<body background="Imagenes/2.jpg">
	<div>	
	<h3 class="tituloSecundarioRegistro"> Bienvenido: </h3>
		<?php echo $_SESSION["usuario"]["nombre_Usuario"] ?>
		<img src="Imagenes/Titulo.png" class="imagenTituloRegistro">
		<div class="divRegistro">
			<div class="registro">
					<h3 class="tituloSecundarioRegistro"> Crear Perfil </h3>
				<form action="verYCrearPerfiles.php" method="post" enctype="multipart/form-data">
					<label class="labelWhite">Nombre: </label><br>
					<input type="text" class="redondeado" id="nombre" name="nombre"><br>
					<label class="labelWhite">Seleccionar imagen: </label>
					<input type="file" class="redondeado" id="imagen" name="imagen" accept="image/png,image/jpeg"><br>
					<button type="submit" class="boton"><strong>Aceptar</strong></button>
			  	</form>
		    </div>
		<div class="registro">
				<h3 class="tituloSecundarioRegistro"> Perfiles creados </h3>
				<!--En esta parte del codigo hay que consultar a la base de datos todos los perfiles que tiene cargados, y mostrarlos como un link. Ese link debe redireccionar al Home o Index.-->
			
				<?php
					//Se fija si hay perfiles
					$sql="SELECT nombre_Perfil from perfil WHERE nombre_Usuario = '" . $_SESSION["usuario"]["nombre_Usuario"] ."'";
					$result=mysqli_query($conexion,$sql);
					//
					if( mysqli_num_rows($result) == 0 )
						echo " No hay ningun perfil creado" ;
					else {

					while($mostrar=mysqli_fetch_array($result)){
				?>

				<tr>
					<td><?php echo $mostrar['imagen'] ?></td> &nbsp;&nbsp;
					<td> <a href= "Home.php?perfil=Mi Perfil"> <strong>;<?php echo $mostrar['nombre_Perfil'] ?> </strong> </a></td> &nbsp;&nbsp;
					
				</tr>
	 <?php 
		 }
		}
	 ?>
		 <?php       
		 			//agrega un perfil a la bbdd
					$sql="SELECT nombre_Perfil from perfil WHERE nombre_Usuario = '" . $_SESSION["usuario"]["nombre_Usuario"] ."'";
					$result=mysqli_query($conexion,$sql);

					if (isset($_POST['nombre'])&&(mysqli_num_rows($result) <= 1 )){
						$sql= "INSERT INTO perfil (nombre_Perfil, nombre_Usuario, imagen) VALUES ('" .$_POST["nombre" ]  ."', '" .$_SESSION["usuario"]["nombre_Usuario"] ."','" .$_POST["imagen" ] ."')";
						$result=mysqli_query($conexion,$sql);
					}
					else { 
						if (mysqli_num_rows($result) == 2 )

							echo "Solo se permiten crear hasta 2 usuarios en una cuenta basica";
							
					}

				?>
		   		</div>
		   	</div>
    
</body>
</html>