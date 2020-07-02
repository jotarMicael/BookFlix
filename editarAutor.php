<?php session_start(); 
include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Cargar Autor</title>
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
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				if(mysqli_num_rows($result) <> 1){
					?>
			<li><a class="botonInicio" href="Configuracion.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Configuracion</a></li>
			<?php }?>
			</div>
	</div>
			<h2 class="tituloSecundarioConfiguracion" >Ingrese los datos del autor que quiere editar</h2>
			<div class="divConfiguracion">
				
				  <div class="registroConfiguracion">
				  <form action="editarAutor.php" method="post" enctype="multipart/form-data">
					<label class="labelWhite">Nombre: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="nombreAutor" name="nombreAutor"><br>
					<label class="labelWhite">Apellido: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="apellidoAutor" name="apellidoAutor"><br>
                    <label class="labelWhite">Nuevo Nombre: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="newNombreAutor" name="newNombreAutor"><br>
					<label class="labelWhite">Nuevo Apellido: </label><br>
					<input type="text" class="redondeado" autocomplete="on" id="newApellidoAutor" name="newApellidoAutor"><br>
					<input type="submit" class="boton" value="Ingresar"><br>
					</form>
				  </div>
				
		   	</div>
			<?php 
			
				if (!empty($_POST['nombreAutor'])&&!empty($_POST['apellidoAutor'])){
					$sql= "SELECT id_Autor,nombre,apellido FROM autor WHERE apellido = '".$_POST['apellidoAutor']."' and nombre = '".$_POST['nombreAutor']."' ";
                    $result=mysqli_query($conexion,$sql);
                    $mostrar=mysqli_fetch_array($result);
					if( mysqli_num_rows($result) == 1 ){  
                        if (!empty($_POST['newNombreAutor'])||!empty($_POST['newApellidoAutor'])){
                            if (empty($_POST['newNombreAutor']))
                                $_POST['newNombreAutor']=$mostrar['nombre'];
                            if (empty($_POST['newApellidoAutor']))
                                $_POST['newApellidoAutor']=$mostrar['apellido'];
                            $sql= "UPDATE autor SET nombre='".$_POST['newNombreAutor']."', apellido='".$_POST['newApellidoAutor']."' WHERE id_Autor='".$mostrar['id_Autor']."'";
					        $result=mysqli_query($conexion,$sql);
                            echo "<font color=white  size='5pt'> Modificado Correctamente </font>";
                        }
                        else
                            echo "<font color=white  size='5pt'> Debe ingresar algun dato para modificar </font>";
					}
					else {
						echo "<font color=white  size='5pt'> El autor ingresado no existe </font>";

					}
                }
                else
                    echo "<font color=white  size='5pt'> Debe ingresar nombre y apellido del autor a modificar </font>";

			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>