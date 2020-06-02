<?php
function resultadoBusqueda(){
	include('conexion.php');
	$busca= $_POST['busca'];
	$result=mysqli_query($conexion, "SELECT * FROM libro WHERE (nombre_Libro LIKE '$busca%' or ISBN LIKE '$busca%')");
	return $result;
	exit;
}
?>