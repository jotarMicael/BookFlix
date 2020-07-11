<?php
  include('conexion.php');
  session_start();
  $sql= "UPDATE reseña SET reportada = 'No', spoiler = 'Si' WHERE texto = '".$_POST['texto']."' ";
  //$sql= "DELETE FROM reseña WHERE texto = '".$_POST['texto']."'  ";
  $result=mysqli_query($conexion,$sql);
  $_SESSION['error']='Comentario marcado como spoiler de forma exitosa';
  header("Location:listarReportes.php");
  exit;
?>