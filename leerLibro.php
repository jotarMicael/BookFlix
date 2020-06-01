<?php
session_start();
include('conexion.php');
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");

$sql2="SELECT nombre_Perfil from perfilleelibro where id_Libro = '".$_GET['idLibro']."' AND nombre_Perfil = '" .$_GET['perfil']."' ";
$result2=mysqli_query($conexion,$sql2);

if( mysqli_num_rows($result2) == 0 ){

$sql1= "INSERT INTO perfilleelibro(nombre_Perfil,id_Libro) VALUES ('" .$_GET['perfil']."','" .$_GET['idLibro']."')";
mysqli_query($conexion,$sql1);

}

$sql="SELECT pdf from libro where id_Libro = '".$_GET['idLibro']."'";
$result=mysqli_query($conexion,$sql);
$mostrar=mysqli_fetch_array($result);
readfile('pdfs/'.$mostrar['pdf']);
?>