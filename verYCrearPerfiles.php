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
					if (empty($_FILES['imagen'])) {
						echo "No hay perfiles creados";
					}
					$sql="SELECT * from perfiles";
					$result=mysqli_query($conexion,$sql);

					while($mostrar=mysqli_fetch_array($result)){
				?>

				<tr>
					<td><?php echo $mostrar['imagen'] ?></td>
					<td><?php echo $mostrar['nombre'] ?></td>
					
				</tr>
	 <?php 
	 	if(isset($_POST["imagen"])){


		 }
	}
	 ?>
		   		</div>
		   	</div>
    
</body>
</html>