<?php
  include('conexion.php');
  session_start();
  $sql= "INSERT INTO perfilleyolibro (nombre_Perfil,id_Libro) VALUES ('".$_SESSION['perfilNombre']."','".$_POST['idLibro']."')";
  $result=mysqli_query($conexion,$sql);

  $sql= "UPDATE autor SET leido=leido+1 WHERE apellido = '".$_POST['apellido']."' ";
  $result=mysqli_query($conexion,$sql);

  $sql= "UPDATE editorial SET leido=leido+1 WHERE nombre_Editorial = '".$_POST['editorial']."' ";
  $result=mysqli_query($conexion,$sql);

  $sql= "UPDATE genero SET leido=leido+1 WHERE nombre_Genero = '".$_POST['genero']."' ";
  $result=mysqli_query($conexion,$sql);
  
  $_SESSION['error']='El libro ha sido registrado como leido';
  header("Location:Home.php");
  exit;
?>