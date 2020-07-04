<?php
	session_start();
	include("conexion.php");

	if(!($_POST['publish'])){
		$_SESSION['error'] = "No se puede publicar un mensaje vacio";
		header('Location: publicarReseña.php');
		exit;
	}
	if(strlen($_POST['publish']>140)){
		$_SESSION['error'] = "No se puede publicar un mensaje con mas de 140 caracteres";
		header('Location: publicarReseña.php');
		exit;
	}
	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$fecha= date('Y-m-d H:i:s');

	$result = mysqli_query($conexion, "INSERT INTO interaccion(fechaHora,nombre_Perfil,id_Libro,nombre_Capitulo) VALUES ('" . $_POST['publish'] . "', '$fecha')");
	header("Location: Home.php");
	exit;
?>
