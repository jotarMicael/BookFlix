<?php session_start(); 
include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<title>Calificar</title>
</head>
<body background= "Imagenes/2.jpg">
	<h3 class="tituloTerciarioConfiguracion">
		<?php if (!empty($_SESSION['error'])){
    		echo $_SESSION['error'];
			unset($_SESSION['error']);} ?> </h3>
	<div class="barraInicio">	
		<div class="divBotones"> 
		<a class="botonInicio" href="Home.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Inicio </a>
	    </div>	
	 </div>
	 <img class="imagenTitulo" src="Imagenes\Titulo.png">
			<div class="divConfiguracion">
				
				  <div class="registroConfiguracion">
				  <form action="cargarEditorial.php" method="post" enctype="multipart/form-data">
                  <p>
                  <h3 class="tituloSecundarioConfiguracion" >Calificacion:</h3>
                  

                        <select name="calificacion">
                            <option>1 </option>
                            <option>2 </option>
                            <option>3 </option>
                            <option>4 </option>
                            <option>5 </option>
                        </select>
                        <br>
                        <br>
                        
                        <label class="labelWhite">(De menor puntaje a mayor puntaje)</label>
                        <br>
                        <br>
                        

                    <input type="submit" class="boton" value="Enviar calificacion">
                 </p>
					</form>
				  </div>
				
		   	</div>
			<?php 
				if (isset($_POST['calificacion'])){

						$sql= "INSERT INTO calificacion (nombre_Editorial) VALUES ('" .$_POST["calificacion"]."')";
						$result=mysqli_query($conexion,$sql);
						echo "<font color=white  size='5pt'> La editorial se ha cargado correctamente </font>";

					
				}
			?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>