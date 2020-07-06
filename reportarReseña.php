<?php
  include('conexion.php');
  session_start();
  $sql= "UPDATE reseña SET reportada = 'Si' WHERE texto = '".$_POST['texto']."' ";
  $result=mysqli_query($conexion,$sql);
  $_SESSION['error']='Gracias por su contribucion, el reporte ha sido derivado a un administrador para su analisis';
  header("Location:Home.php");
  exit;
?>