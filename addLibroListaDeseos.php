<?php
  include('conexion.php');
  session_start();


  $sql= "INSERT INTO listadeseos(nombre_Perfil,id_Libro,nombre_Libro) VALUES ('".$_SESSION['perfilNombre']."','".$_POST['idLibro']."','".$_POST['titulo']."')";
  $result=mysqli_query($conexion,$sql);
  $_SESSION['error']='¡Agregado a la lista de deseos!';
  $vr=$_POST['idLibro'];
  $tit=$_POST['titulo'];
  $lib=$_POST['libro'];
  header("Location:vistaPrevia.php?idLibro=$vr&titulo=$tit&libro=$lib");
  exit();
?>