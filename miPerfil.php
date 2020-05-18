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
          <a class="botonInicio" href="Home.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Inicio </a>
	    </div>
	    <div class="divBotones">
          <a class="botonInicio" href="miPerfil.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>">Mi Perfil</a>
	    </div>
	    <div class="divBotones">
        <form action="Busqueda.php" method="post">
          <input class="text" type="search" name="busca" autofocus required size="18" maxlength="15" autocomplete="on" >
          <input type="submit" class="botonInicio" value="Buscar"></a>
        </form>
        </div>
	    <div class="divBotones">
            <a class="botonInicio" href="Configuracion.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Configuracion </a>
	    </div>  
	</div>
	<img src="Imagenes/Titulo.png" class="imagenTituloRegistro">
	<div class="fondoPerfil">
	<div class="panelPerfil">
		<div class="imagenPanelPerfil">
		<image src="/BookFlix/ImagenesServer/<?php echo $_SESSION['perfilImagen'];?>" width="100" />
		</div>
		<div class="nombreUsuarioPanelPerfil">
			<label class="labelWhite"><?php echo $_SESSION ['usuario']['nombre_Usuario'] ?></label>
		</div>
		<div class="nombrePanelPerfil">
			<label class="labelWhite"><?php echo $_SESSION['perfilNombre'] ?> </label>
		</div>
	  <div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Gallardo Ucero Valentin</p>
    </div>
</body>
</html>