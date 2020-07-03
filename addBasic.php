<?php
  include('conexion.php');
  session_start();
  //$sql="DELETE FROM cuentausuariotipopremiun WHERE '".$_SESSION['usuario']['nombre_Usuario']."'=nombre_Usuario ";
  $sql= "UPDATE cuentausuariotipopremiun SET validada = 'VB' WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."'";
  $result=mysqli_query($conexion,$sql);
  $_SESSION['error']='Usted ha solicitado el cambio a cuenta basica';
  header("Location:Configuracion.php");
  exit;
?>