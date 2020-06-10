<?php
function resultadoBusqueda(){
	include('conexion.php');
	$busca= $_POST['busca'];
	$result=mysqli_query($conexion, "SELECT *
   FROM libro l 
   INNER JOIN generopertenecelibro gp ON (l.id_Libro= gp.id_Libro) 
   INNER JOIN genero g ON (g.id_Genero = gp.id_Genero) 
   INNER JOIN editorial e ON (e.id_Editorial = l.id_Editorial) 
   INNER JOIN autoreslibro al ON (al.id_Libro = l.id_Libro)
   INNER JOIN autor a ON (a.id_Autor = al.id_Autor)
   WHERE l.nombre_Libro = '".$_POST['busca']."' OR g.nombre_Genero = '".$_POST['busca']."' OR a.nombre = '".$_POST['busca']."' OR e.nombre_Editorial = '".$_POST['busca']."' ");
	
	return $result;
	exit;

}
?>

