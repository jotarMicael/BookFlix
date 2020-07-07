<?php session_start();
 include('conexion.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity=" sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="all.css" rel="stylesheet" type="text/css">
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<script type="text/javascript" src="scriptInicio.js"></script>
	<title>Perfil</title>
</head>
<body background="Imagenes/2.jpg">
	<div class="barraInicio" >
		<div class="divBotones">
          <a class="botonInicio" href="Home.php?&perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Inicio </a>
	    </div>
	    <div class="divBotones">
          <a class="botonInicio" href="miPerfil.php?&perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Mi Perfil</a>
	    </div>
	    <div class="divBotones">
        </div>
	    <div class="divBotones">
            <a class="botonInicio" href="Configuracion.php?&perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Configuracion </a>
	    </div>  
	</div>
	<img src="Imagenes/Titulo.png" class="imagenTituloRegistro">
	<h2 class="tituloSecundarioConfiguracion" >Lista de Deseos:</h2>
    <?php if (!empty($_SESSION['error'])) {
			echo "<font color=white  size='5pt'> ".$_SESSION['error']." </font>";
			unset($_SESSION['error']);
		} ?>
				
						<?php 
							$sql2="SELECT id_Libro from listadeseos where nombre_Perfil = '" .$_SESSION['perfilNombre']."' AND nombre_Capitulo='' ";
                            $result2=mysqli_query($conexion,$sql2);
                            if(mysqli_num_rows($result2) == 0){ ?>
                                <h2 class="tituloSecundarioConfiguracion" >No hay libros añadidos</h2>
                        <?php
                            }
                            else{
							while($mostrar2=mysqli_fetch_array($result2)){;
                            

							$sql="SELECT imagenTapaLibro,nombre_Libro,id_Editorial,id_Libro from libro where id_Libro = '" .$mostrar2['id_Libro']."' ";
							$result=mysqli_query($conexion,$sql);
							while($mostrar=mysqli_fetch_array($result)){
						?>
							<div class="divLibro">
								<a href="#"><image width="80%" src="/BookFlix/Portadas/<?php echo $mostrar['imagenTapaLibro'];?>"/></a><br><br>
								<br>
								<td> <a href="vistaPrevia.php?&libro=<?php echo $mostrar['imagenTapaLibro'];?>&titulo=<?php echo $mostrar['nombre_Libro'];?>&idEdi=<?php echo $mostrar['id_Editorial'];?>&idLibro=<?php echo $mostrar['id_Libro'];?>&perfil=<?php echo $_GET['perfil'];?>"> <strong> <?php echo $mostrar['nombre_Libro'];?> </strong> </a></td> <br> &nbsp;
								<br>
								
						<br>
                        <form action="deleteLibrosDeseados.php" method="post" onsubmit="confirm();" enctype="multipart/form-data">
					        <input type="hidden" name="idLibro" id="idLibro" value="<?php echo $mostrar['id_Libro'];?>">
					        <input type="submit" class="botonInicio" name="Eliminar" value="Eliminar">
					    </form>
							</div>
                        <?php 
                        echo $_SESSION['perfilNombre'];
							 } } }
						 ?>
				
</body>
</html>