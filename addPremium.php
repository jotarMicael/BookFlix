<?php
  include('conexion.php');
  session_start();
  $actual2=date('Y-m-d');
  $fecha= strtotime('+1 month',strtotime($actual2));
  $fecha= date('Y-m-d',$fecha);
  $sql= "INSERT INTO cuentausuariotipopremiun (nombre_Usuario,fecha_Vencimiento,validada) VALUES ('".$_SESSION['usuario']['nombre_Usuario']."','$fecha
  ','No')";
  $result=mysqli_query($conexion,$sql);
  $_SESSION['error']='Peticion Generada correctamente';
  header("Location:verYCrearPerfiles.php");
  exit;
?>