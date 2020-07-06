<?php session_start(); 
include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Eliminar Perfil</title>
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
    
    <div class="registro">
				<h3 class="tituloSecundarioRegistro"> Perfiles</h3>
				<!--En esta parte del codigo hay que consultar a la base de datos todos los perfiles que tiene cargados, y mostrarlos como un link. Ese link debe redireccionar al Home o Index.-->
                <form method="POST" action="deletePerfil.php" enctype="multipart/form-data">
                  
				<?php
					echo $_SESSION["usuario"]["nombre_Usuario"];
                    //Se fija si hay perfiles
                    
					$sql1="SELECT nombre_Perfil from perfil WHERE nombre_Usuario = '" . $_SESSION["usuario"]["nombre_Usuario"] ."'";
					$result1=mysqli_query($conexion,$sql1);
					
					if( mysqli_num_rows($result1) == 0 ) {
                    	echo "<font color=white  size='5pt'> La cuenta no posee ningun perfil </font>"; }
					else {
					while($mostrar=mysqli_fetch_array($result1)){
				?>
				<select name="prf" id="prf">  
				<tr>	
					<div>
						<br>
                        
                                
							 <option><?php echo $mostrar['nombre_Perfil'];?></option> 
							
                             

                             

                        
                    </div>
				</tr>
	 <?php 
         }
          
		}
	 ?>
     </select>
     <input type="submit" class="boton" onclick="confirm()" value="Eliminar"><br> 
     </form> 
	</div>
			<?php 
			
				if (!empty($_POST['prf'])){
                            $sql= "DELETE FROM perfil WHERE '".$_POST['prf']."'=nombre_Perfil AND '". $_SESSION["usuario"]["nombre_Usuario"] ."'=nombre_Usuario ";
					        $result=mysqli_query($conexion,$sql);
							echo "<font color=white  size='5pt'> Eliminado Correctamente </font>";
							header('Location: verYCrearPerfiles.php');
                }


			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>