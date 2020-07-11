<?php
include('conexion.php');
session_start();
$sql= "INSERT INTO calificacion (nombre_Perfil,id_Libro,valor,nombre_Capitulo) VALUES ('".$_SESSION['perfilNombre']."','".$_POST['idLibro2']."','" .$_POST["calificacion"]."','" .$_POST["nCap2"]."')";
	   $result=mysqli_query($conexion,$sql);
       $_SESSION['error'] = "Puntaje Enviado";
       header("Location: Home.php");
?>