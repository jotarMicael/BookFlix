<?php
	session_start();

	if (!empty($_SESSION['error'])) {
		echo "<font color=white  size='5pt'> ".$_SESSION['error']." </font>";
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
	?>
</head>
<body background="Imagenes/2.jpg">
	<div>	
	<h3 class="tituloSecundarioRegistro"> ¡Bienvenido!: <strong> <?php echo $_SESSION['usuario']['nombre_Usuario']?>, ¡Que bueno tenerlo nuevamente! </strong></h3>
		<img src="Imagenes/Titulo.png" class="imagenTituloRegistro">
		<?php
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>
			<li><a href="hacersePremium.php" class="boton">¡Hazte Premium!</a></li>
			<h3 class="tituloSecundarioRegistro"> ¡Y disfruta de beneficios Exclusivos! </h3>
				<?php }?>
			</div>
			<br>
			<br>
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
					$sql="SELECT nombre_Perfil, imagen from perfil WHERE nombre_Usuario = '" . $_SESSION["usuario"]["nombre_Usuario"] ."'";
					$result=mysqli_query($conexion,$sql);
					//
					if( mysqli_num_rows($result) == 0 )
					echo "<font color=white  size='5pt'> No hay ningun perfil creado </font>";
					else {
					$_SESSION['actualizar']=0;
					while($mostrar=mysqli_fetch_array($result)){
				?>

				<tr>	
					<div>
						<br>
						<div class="imagenPerfil"><td> <image src="/BookFlix/ImagenesServer/<?php echo $mostrar['imagen'];?>" /> </td> &nbsp;&nbsp;</div>
						<br>
						<td> <a href= "Home.php?perfil=<?php echo $mostrar['nombre_Perfil'];?>&img=<?php echo $mostrar['imagen']?>"> <strong><?php echo $mostrar['nombre_Perfil']?> </strong> </a></td> &nbsp;&nbsp;
						<br>
					</div>
				</tr>
	 <?php 
		 }
		}
	 ?>
		 <?php    
					if (isset($_POST['nombre'])&&(mysqli_num_rows($result) <= 1 )){

						if(isset($_FILES['imagen'])){
							$nombre_Imagen = $_FILES ['imagen']['name'];
							$tipo_Imagen = $_FILES ['imagen']['type'];
							$tamagno_Imagen = $_FILES ['imagen']['size'];

							if ($tamagno_Imagen<=30000000){
								if(($tipo_Imagen == "image/jpg") || ($tipo_Imagen == "image/png") || ($tipo_Imagen == "image/jpeg")){
									//Ruta de la carpeta destino
									$carpeta_Destino = $_SERVER ['DOCUMENT_ROOT'] . '/BookFlix/ImagenesServer/';
									//Mover imagen del directorio temporal al directorio escogido
									move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_Destino.$nombre_Imagen);
									header("Location: verYCrearPerfiles.php");
								}
								else {
									echo "<font color=white  size='5pt'> Solo se puede subir: png, jpg, jpeg </font>";
								}
								
							}
							else{
								echo "El tamaño de la imagen es demasiado grande";
							}
							$sql1="SELECT nombre_Perfil from perfil WHERE nombre_Perfil = '" .$_POST["nombre" ]  ."' and nombre_Usuario = '" . $_SESSION["usuario"]["nombre_Usuario"] ."'" ;
							$result2=mysqli_query($conexion,$sql1);
							if( mysqli_num_rows($result2) == 1 ){
								$_SESSION['error']='Ya existe un perfil con este nombre';
								header("Location: verYCrearPerfiles.php");}
							else{
								if(empty($nombre_Imagen)){
									$_SESSION['error']='El perfil debe contener una imagen';
									header("Location: verYCrearPerfiles.php");
								}
								else{
									$sql= "INSERT INTO perfil (nombre_Perfil, nombre_Usuario, imagen) VALUES ('" .$_POST["nombre" ]  ."', '" .$_SESSION["usuario"]["nombre_Usuario"] ."','$nombre_Imagen')";
									$result=mysqli_query($conexion,$sql);
								}
							}
							
						}
						else{
							echo "<font color=white  size='5pt'> Debe seleccionar una imagen de perfil </font>";
						}
					}
					else { 
						if (mysqli_num_rows($result) == 2 )
						echo "<font color=white  size='5pt'> Solo se permiten crear hasta 2 usuarios en una cuenta basica </font>";
							
					}

				?>
		   		</div>
				   
		   	</div>
    
</body>
</html>