<?php
	session_start();
	include('conexion.php');
	$id= $_GET['idNoti'];
	mysqli_query($conexion, "DELETE FROM noticia WHERE $id = id_Noticia ");

	header('Location: Home.php');
?>