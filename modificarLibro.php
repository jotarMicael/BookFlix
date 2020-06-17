<?php session_start(); 
include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Modificar Libro</title>
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
			<input type="text" class="redondeado" autocomplete="on" id="" name="">
			
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
			<h2 class="tituloSecundarioConfiguracion" >Ingrese los datos del libro</h2>
			<div class="divConfiguracion">
			<?php
				$result5 = mysqli_query($conexion, "SELECT * FROM libro WHERE id_Libro = '".$_GET['idLibro']."' ");
				$mostrar6=mysqli_fetch_array($result5, MYSQLI_ASSOC);
				$idi=$_GET['idLibro'];
				if(empty($idi)){
					$idi=$_POST["idLibro"];
				}
				$img=$_GET['imagen'];
				if(empty($img)){
					if(isset($_FILES['imagen'])){
						 $img=$_FILES ['imagen']['name'];}
					else{
						$img='JRV';
					}
				}
					?>	
			<div class="registroConfiguracion">
				  <form method="POST" action="modificarLibro.php" enctype="multipart/form-data">
					<label class="labelWhite">Nombre del Libro: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="nombreLibro" name="nombreLibro" value="<?php echo $mostrar6['nombre_Libro']; ?>"><br>
					<label class="labelWhite">ISBN: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="ISBN" maxlength="13" name="ISBN" value="<?php echo $mostrar6['ISBN']; ?>"><br>
					<label class="labelWhite">Fecha de Lanzamiento: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="fecha_Lanzamiento" length="13" name="fecha_Lanzamiento" placeholder="aaaa-mm-dd" value="<?php echo $mostrar6['fecha_Lanzamiento']; ?>"><br>
					<label class="labelWhite">Disponibilidad de basico hasta: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="fecha_BajaBasico" length="13" name="fecha_BajaBasico" placeholder="aaaa-mm-dd" value="<?php echo $mostrar6['fecha_DeBaja']; ?>"><br>
					<label class="labelWhite">Disponibilidad de premiun hasta: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="fecha_BajaPremium" length="13" name="fecha_BajaPremium" placeholder="aaaa-mm-dd" value="<?php echo $mostrar6['fecha_DeBaja2']; ?>"><br>
					<label class="labelWhite">Seleccionar portada: </label>
					<input type="file" class="redondeado" id="imagen" name="imagen" accept="image/png,image/jpeg,image/jpg" value="<?php echo $img ?>" > <br>
					<label class="labelWhite">Cantidad de Capitulos: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="cantCap" name="cantCap" value="<?php echo $mostrar6['capitulos']; ?>"><br>
					<input type="hidden" class="boton" value="<?php echo $idi ?>" id="idLibro" name="idLibro"> <br>
					<input type="submit" class="boton" value="Ingresar"><br>
					</form>
				  </div>
		   	</div>	
		   	</div>
			<?php 
				if (isset($_POST['nombreLibro']) && isset($_POST['ISBN']) && isset($_POST['fecha_Lanzamiento']) && isset($_POST['fecha_BajaBasico']) && isset($_POST['fecha_BajaPremium']) && isset($_FILES['imagen']) && isset($_POST['cantCap'])){
					
				
					
					if(isset($_FILES['imagen'])){

						$nombre_Imagen=$_FILES ['imagen']['name'];
						$tipo_Imagen=$_FILES ['imagen']['type'];
						$tamagno_Imagen=$_FILES ['imagen']['size'];

						if ($tamagno_Imagen<=30000000){
							if(($tipo_Imagen=="image/jpg") || ($tipo_Imagen =="image/png") || ($tipo_Imagen=="image/jpeg")){
								//Ruta de la carpeta destino
								$carpeta_Destino=$_SERVER ['DOCUMENT_ROOT'].'/BookFlix/Portadas/';
								//Mover imagen del directorio temporal al directorio escogido
								move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_Destino.$nombre_Imagen);
								$P=$_FILES ['imagen']['name'];
							}
							else {
								echo " <font color=white  size='5pt'> Solo se puede subir: png, jpg, jpeg </font>";
							}
							
						}
						else{

							echo "<font color=white  size='5pt'> El tamaño de la imagen es demasiado grande </font>";
						}

					}else{
						$P=$img;
					}
					
					
					
					$fecha_1 = $_POST["fecha_Lanzamiento"]; //Recibe una string en formato dd-mm-yyyy 
					$fecha_2 = $_POST["fecha_BajaBasico"]; //Recibe una string en formato dd-mm-yyyy 
					$fecha_3 = $_POST["fecha_BajaPremium"];

					$inicio = strtotime($fecha_1); //Convierte el string a formato de fecha en php
					$baja = strtotime($fecha_2); //Convierte el string a formato de fecha en php
					$baja2 = strtotime($fecha_3);

					$inicio = date('Y-m-d',$inicio); //Lo comvierte a formato de fecha en MySQL
					$baja = date('Y-m-d',$baja); //Lo comvierte a formato de fecha en MySQL
					$baja2 = date('Y-m-d',$baja2);
					
					//$sql2="UPDATE libro SET nombre_Libro='" .$_POST["nombreLibro"]."', fecha_Lanzamiento= '$inicio', fecha_DeBaja= '$baja', fecha_DeBaja2='$baja2', imagenTapaLibro='$nombre_Imagen',ISBN='".$_POST["ISBN"]."',capitulos='".$_POST["cantCap"]."' WHERE id_Libro='".$_GET["idLibro"]."' ";
					if (empty($nombre_Imagen)){
						$sql2="UPDATE libro SET nombre_Libro='".$_POST['nombreLibro']."', fecha_Lanzamiento= '$inicio', fecha_DeBaja= '$baja', fecha_DeBaja2='$baja2',ISBN='".$_POST["ISBN"]."',capitulos='".$_POST["cantCap"]."' WHERE id_Libro='$idi' ";
					}
					else{
					$sql2="UPDATE libro SET nombre_Libro='".$_POST['nombreLibro']."', fecha_Lanzamiento= '$inicio', fecha_DeBaja= '$baja', fecha_DeBaja2='$baja2', imagenTapaLibro='$P',ISBN='".$_POST["ISBN"]."',capitulos='".$_POST["cantCap"]."' WHERE id_Libro='$idi' ";
					}
					
					
					$result11=mysqli_query($conexion,$sql2);
					$_SESSION['error']='Libro modificado exitosamente';
					header("Location: Home.php");
					
					
					
				}
				else{
					echo "<font color=white  size='5pt'> Todos los campos deben estar completos </font>";
				}
			
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>