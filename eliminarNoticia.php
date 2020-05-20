<?php
	session_start();
	include('conexion.php');

	mysqli_query($conexion, "DELETE FROM noticia WHERE '" . $_GET['id_Noticia'] . "' = id_Noticia ");

	header('Location: Home.php');
?>