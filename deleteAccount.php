<?php
  include('conexion.php');
  session_start();
  $sql="DELETE FROM cuenta WHERE '".$_SESSION['usuario']['nombre_Usuario']."'=nombre_Usuario ";
  $result=mysqli_query($conexion,$sql);
  $sql="DELETE FROM cuentausuario WHERE '".$_SESSION['usuario']['nombre_Usuario']."'=nombre_Usuario ";
  $result=mysqli_query($conexion,$sql);
  $sql="DELETE FROM cuentausuariotipobasica WHERE '".$_SESSION['usuario']['nombre_Usuario']."'=nombre_Usuario ";
  $result=mysqli_query($conexion,$sql);
  $sql="DELETE FROM cuentausuariotipopremiun WHERE '".$_SESSION['usuario']['nombre_Usuario']."'=nombre_Usuario ";
  $result=mysqli_query($conexion,$sql);
  unset($_SESSION["perfilImagen"]); 
  unset($_SESSION["perfilNombre"]);
  unset($_SESSION["usuario"]);
  $_SESSION['error']='La cuenta ha sido eliminada del sistema';
  session_destroy();
  header("Location:index.php");
  exit;
?>