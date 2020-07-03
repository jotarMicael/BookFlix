<?php session_start(); 
include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Peticiones</title>
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
				<h3 class="tituloSecundarioRegistro"> Peticiones a premiun de los usuarios: </h3>
                <form method="POST" action="acceptPremiun.php" enctype="multipart/form-data">
                   
				<?php
                    
					$sql2="SELECT nombre_Usuario from cuentausuariotipopremiun WHERE validada='No' ";
					$result=mysqli_query($conexion,$sql2);
					if(mysqli_num_rows($result) == 0) {
                        echo "<font color=white  size='5pt'> No hay peticiones </font>"; }
					else {
                    
					while($mostrar=mysqli_fetch_array($result)){
				?>
                <select name="prf" id="prf"> 
				<tr>	
					<div>
						<br>
                        
                                
                             <option><?php echo $mostrar['nombre_Usuario'];?></option> 
                             

                             

                        
                    </div>
				</tr>
	 <?php 
         }
          
		}
	 ?>
     <br>
     </select> <br> <br> <br> 
     <input type="submit" class="boton" onclick="return confirm()" value="Aceptar Peticion"><br> <br>
     </form> 
	</div>
			<?php 
			
				if (!empty($_POST['prf'])){
                            $sql= "UPDATE cuentausuariotipopremiun SET validada = 'Si' WHERE nombre_Usuario = '".$_POST['prf']."'";
					        $result=mysqli_query($conexion,$sql);
                            echo "<font color=white  size='5pt'> La cuenta ha sido activada como premiun </font>";
                }


			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>