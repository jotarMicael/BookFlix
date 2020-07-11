<?php
  include('conexion.php');
  session_start();
  $sql= "INSERT INTO perfilleyocapitulo (nombre_Perfil,id_Capitulo) VALUES ('".$_SESSION['perfilNombre']."','".$_SESSION['idC']."')";
  $result=mysqli_query($conexion,$sql);

  
  $_SESSION['error']='El capitulo ha sido registrado como leido';

  $vr=$_POST['idLibro'];
  $tit=$_POST['nCap'];
  $lib=$_POST['nLibro'];
  header("Location:detalleCapitulo.php?idLibro=$vr&nCap=$tit&nLibro=$lib");

  
  exit;
?>