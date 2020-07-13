<?php
  include('conexion.php');
  session_start();
  

  $sql2="SELECT vencimientoBasico FROM cuentausuariotipobasica WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ";
  $result2=mysqli_query($conexion,$sql2);
  
  $mostrar25=mysqli_fetch_array($result2, MYSQLI_ASSOC);

  $sql= "INSERT INTO cuentausuariotipopremiun (nombre_Usuario,fecha_Vencimiento,validada) VALUES ('".$_SESSION['usuario']['nombre_Usuario']."','$mostrar25[vencimientoBasico]','No')";
  $result=mysqli_query($conexion,$sql);

  $_SESSION['error']='Peticion Generada correctamente';
  header("Location:Home.php");
  exit;
?>