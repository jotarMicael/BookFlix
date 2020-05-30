<?php
include('conexion.php');
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
$sql="SELECT pdf from libro where id_Libro = '".$_GET['idLibro']."'";
$result=mysqli_query($conexion,$sql);
$mostrar=mysqli_fetch_array($result);
readfile('pdfs/'.$mostrar['pdf']);
?>