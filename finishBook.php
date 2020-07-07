<?php
  include('conexion.php');
  session_start();
  $sql= "INSERT INTO perfilleyolibro (nombre_Perfil,id_Libro) VALUES ('".$_SESSION['perfilNombre']."','".$_POST['idLibro']."')";
  $result=mysqli_query($conexion,$sql);
  $_SESSION['error']='El libro ha sido registrado como leido';
  header("Location:Home.php");
  exit;
?>