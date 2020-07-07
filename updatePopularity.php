<?php
  include('conexion.php');
  session_start();
  //$sql="DELETE FROM cuentausuariotipopremiun WHERE '".$_SESSION['usuario']['nombre_Usuario']."'=nombre_Usuario ";
  $sql2="SELECT sum(valor) FROM calificacion WHERE id_Libro='".$mostrar['id_Libro']."'";
		$result2=mysqli_query($conexion,$sql2);
		foreach($result2 as $row)
        $pr=($row['sum(valor)'])/(mysqli_num_rows($result2));
        
  $sql= "UPDATE popularidad SET popularidad = '".$row['sum(valor)']."', id_Libro='".$mostrar['id_Libro']."'";
  $result=mysqli_query($conexion,$sql);
  $_SESSION['error']='Usted ha solicitado el cambio a cuenta basica';
  header("Location:Configuracion.php");
  exit;
?>