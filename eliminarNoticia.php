<?php
	session_start();
	include('conexion.php');

	mysqli_query($conexion, "DELETE FROM noticia WHERE  id_Noticia =  '" . $_GET['id_Noti'] . "'");

	header('Location: Home.php');
?>