<?php
	session_start();
	include('conexion.php');
	$ar= $_GET['archivo'];
	mysqli_query($conexion, "DELETE FROM trailer WHERE archivo_Trailer = '$ar' ");

	header('Location: Home.php');
?>