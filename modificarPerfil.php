<?php session_start(); 
include('conexion.php');
session_start();
	if ($_SESSION['actualizar']==0){
		$_SESSION['perfilImagen']= $_GET['img'];
		$_SESSION['perfilNombre']= $_GET['perfil'];
		$_SESSION['actualizar']=1;
	}
	
	if (!empty($_SESSION['error'])) {
		echo "<font color=white  size='5pt'> ".$_SESSION['error']." </font>";
		unset($_SESSION['error']);
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
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario='".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>
			<li><a class="botonInicio" href="Configuracion.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Configuracion</a></li>
            <?php }
            $result20 = mysqli_query($conexion, "SELECT nombre_Perfil FROM perfil WHERE nombre_Perfil = '".$_SESSION['perfilNombre']."' AND nombre_Usuario='".$_SESSION['usuario']['nombre_Usuario']."' ");
            $mostrar11=mysqli_fetch_array($result20, MYSQLI_ASSOC);
            ?>
			</div>
	</div>
			<h2 class="tituloSecundarioConfiguracion" >Ingrese los datos del capitulo</h2>
			<div class="divConfiguracion">
				  <div class="registroConfiguracion">
				  <form action="modificarPerfil.php" method="post" enctype="multipart/form-data">
					<label class="labelWhite">Nombre de Perfil: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="nPerfil" name="nPerfil" value="<?php echo $mostrar11['nombre_Perfil'] ?>"><br>
					<label class="labelWhite">Seleccionar imagen del capitulo: </label><br>
					<input type="file" class="redondeado" id="imagen" name="imagen" accept="image/png,image/jpeg"><br>
					<input type="submit" class="boton" value="Ingresar"><br>
					</form>
				  </div>
				
		   	</div>
			<?php 
			
				if (!empty($_POST['nPerfil'])){

					$sql= "SELECT nombre_Perfil FROM perfil WHERE nombre_Perfil = '".$_POST['nPerfil']."' ";
					$result=mysqli_query($conexion,$sql);
					if(mysqli_num_rows($result) <= 1){

						if(!empty($_FILES['imagen'])){

							$nombre_imagen=$_FILES['imagen']['name'];
							$tipo_imagen=$_FILES['imagen']['type'];
							$tamagno_imagen=$_FILES['imagen']['size'];
	
							if ($tamagno_imagen<=1000000000000){
								if(($tipo_Imagen == "image/jpg") || ($tipo_Imagen == "image/png") || ($tipo_Imagen == "image/jpeg")){
	
									//Ruta de la carpeta destino
									$carpeta_Destino=$_SERVER ['DOCUMENT_ROOT'].'/BookFlix/imagenes/';
									//Mover imagen del directorio temporal al directorio escogido
									move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_Destino.$nombre_imagen);
									
								}	
							}
							else{
	
								echo "<font color=white  size='5pt'> El tamaño del imagen es demasiado grande </font>";
							}
						}

						if(empty($nombre_imagen)){
                            $sql= "UPDATE perfil SET nombre_Perfil='".$_POST['nPerfil']."' WHERE nombre_Perfil='".$_SESSION['perfilNombre']."' AND nombre_Usuario='".$_SESSION['usuario']['nombre_Usuario']."'";
                            $result=mysqli_query($conexion,$sql);
                            $_SESSION['error'] = "Modificacion exitosa";
                            $_SESSION['perfilNombre']=$_POST['nPerfil'];
                            header("Location: modificarPerfil.php");
							exit;
						}
						else{
                            $sql= "UPDATE perfil SET nombre_Perfil='".$_POST['nPerfil']."', imagen='$nombre_imagen' WHERE nombre_Perfil='".$_SESSION['perfilNombre']."' AND nombre_Usuario='".$_SESSION['usuario']['nombre_Usuario']."'  ";
                            $result=mysqli_query($conexion,$sql);
                            $_SESSION['error'] = "Modificacion exitosa";
                            $_SESSION['perfilNombre']=$_POST['nPerfil'];
                            header("Location: modificarPerfil.php");
							exit;
                        }

                    }
                    else{
                        $_SESSION['error'] = "Ya posee un nombre de perfil identico con esta cuenta";
                        header("Location: modificarPerfil.php");

                    }
                 }		
					
				
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>