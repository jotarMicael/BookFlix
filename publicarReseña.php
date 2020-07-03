<?php
	session_start();
	include("conexion.php");

	if(!($_POST['publish'])){
		$_SESSION['error'] = "No se puede publicar un mensaje vacio";
		header('Location: PagInicio.php');
		exit;
	}
	if(strlen($_POST['publish']>140)){
		$_SESSION['error'] = "No se puede publicar un mensaje con mas de 140 caracteres";
		header('Location: PagInicio.php');
		exit;
	}
	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$fecha= date('Y-m-d H:i:s');

	$result = mysqli_query($conexion, "INSERT INTO reseña(texto,fecha) VALUES ('" . $_POST['publish'] . "', '$fecha')");
	header("Location: Home.php");
	exit;
?>
