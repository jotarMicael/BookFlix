<?php
  include('conexion.php');
  session_start();
  $sql= "INSERT INTO perfilleyocapitulo (nombre_Perfil,id_Capitulo) VALUES ('".$_SESSION['perfilNombre']."','".$_SESSION['idC']."')";
  $result=mysqli_query($conexion,$sql);
  $_SESSION['error']='El capitulo ha sido registrado como leido';
  header("Location:Home.php");
  exit;
?>