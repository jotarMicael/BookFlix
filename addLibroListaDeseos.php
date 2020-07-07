<?php
  include('conexion.php');
  session_start();
  $sql= "INSERT INTO listadeseos(nombre_Perfil,id_Libro,nombre_Libro) VALUES ('".$_SESSION['perfilNombre']."','".$_POST['idLibro']."','".$_POST['titulo']."')";
  $result=mysqli_query($conexion,$sql);
  $_SESSION['error']='¡Agregado a la lista de deseos!';
  header("Location:Home.php");
  exit;
?>