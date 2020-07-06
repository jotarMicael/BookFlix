<?php
  include('conexion.php');
  session_start();
  $sql= "DELETE FROM reseña WHERE texto = '".$_POST['texto']."'  ";
  $result=mysqli_query($conexion,$sql);
  $_SESSION['error']='Comentario eliminado de forma exitosa';
  header("Location:listarReportes.php");
  exit;
?>