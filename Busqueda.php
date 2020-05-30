<?php 
session_start();
include('verificadorBusqueda.php');

if (empty($_SESSION['usuario'])) {
	header('Location: index.php');
	exit;}
if (!empty($_SESSION['error'])){
	echo $_SESSION['error'];
	unset($_SESSION['error']);}
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Busqueda</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link href="all.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg"> 
	<script type="text/javascript" src="scriptInicio.js"></script>
</head>
<body background= "Imagenes/2.jpg">
	<div class="barraInicio" >
      <div class="divBotones">
          <a class="botonInicio" href="Home.php"> Inicio </a>
	  </div>
	  <div class="divBotones">
		  <img class="imagenBarraSuperior" src="Imagenes\TituloBarraSuperior.png">
	  </div>
	    <div class="divBotones">
          <a class="botonInicio" href="miPerfil.php"> Perfil </a>
	    </div>
	    <div class="divBotones">
        <form action="Busqueda.php" method="post">
          <input class="text" type="search" name="busca" autofocus required size="18" maxlength="15" autocomplete="on" >
          <input type="submit" class="botonInicio" value="Buscar"></a>
        </form>
        </div>
	    <div class="divBotones">
            <a class="botonInicio" href="Configuracion.php"> Configuracion </a>
	    </div>  
	</div>
	<div class= "fondoBusqueda">
	<?php $result2 = resultadoBusqueda(); 
		 ?>
		<?php
	     if(mysqli_num_rows($result2) == 0){
		 echo "<font color=white  size='5pt'> No hay resultado de busqueda </font>";
		 }
	     else {
		 while($mostrar=mysqli_fetch_array($result2)) {?>
		 	<div class="divLibro">
				<a href="#"><image width="80%" src="/BookFlix/Portadas/<?php echo $mostrar['imagenTapaLibro'];?>"/></a><br><br>
				<br>
				<td> <a href="vistaPrevia.php?libro=<?php echo $mostrar['imagenTapaLibro'];?>&titulo=<?php echo $mostrar['nombre_Libro'];?>&autor=<?php echo $mostrar['autor'];?>&idEdi=<?php echo $mostrar['id_Editorial'];?>&genero=<?php echo $mostrar['genero'];?>&idLibro=<?php echo $mostrar['id_Libro'];?>"> <strong><?php echo $mostrar['nombre_Libro'];?> </strong> </a></td> <br> &nbsp;
				<br>				
				<br>
			</div>
		<?php }} ?>
	</div>
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6</p>
    </div>
</body>