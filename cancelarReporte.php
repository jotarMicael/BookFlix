<?php
  include('conexion.php');
  session_start();
  $sql= "UPDATE reseña SET reportada = 'No' WHERE texto = '".$_POST['texto']."' ";
  $result=mysqli_query($conexion,$sql);
  $_SESSION['error']='Comentario cancelado de forma exitosa';
  header("Location:listarReportes.php");
  exit;
?>