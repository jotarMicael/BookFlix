<?php
function resultadoBusqueda(){
	include('conexion.php');
	$result = mysqli_query($conexion, "SELECT * FROM libros WHERE (nombre_Libro LIKE '%" . $_POST['busca'] . "%' OR autor LIKE '%" . $_POST['busca'] . "%' OR ISBN LIKE '%" . $_POST['busca'] . "%')");

	return $result;
	exit;
}
?>