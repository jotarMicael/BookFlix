<?php
  include('conexion.php');
  session_start();
  $sql= "INSERT INTO listadeseos(nombre_Perfil,nombre_Capitulo,id_Libro) VALUES ('".$_SESSION['perfilNombre']."','".$_POST['nCap']."','".$_POST['idLibro']."')";
  $result=mysqli_query($conexion,$sql);
  $_SESSION['error']='¡Agregado a la lista de deseos!';
  header("Location:Home.php");
  exit;
?>