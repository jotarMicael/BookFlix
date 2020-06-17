<?php
function resultadoBusqueda(){
	include('conexion.php');
   $busca=$_POST['busca'];
   $result=NULL;
   $nm=$_POST['nombreCompletoAutor'];
   $nm=explode(" ", $nm);
   echo $nm[0];
   $nom=$nm[0];
   echo $busca;
   if(isset($busca)){
	$result=mysqli_query($conexion, "SELECT l.id_Libro,l.id_Editorial,l.fecha_Lanzamiento,l.imagenTapaLibro,l.ISBN,l.capitulos,l.nombre_Libro
     FROM libro l 
     INNER JOIN generopertenecelibro gp ON (l.id_Libro= gp.id_Libro) 
     INNER JOIN genero g ON (g.id_Genero = gp.id_Genero) 
     INNER JOIN editorial e ON (e.id_Editorial = l.id_Editorial) 
     INNER JOIN autoreslibro al ON (al.id_Libro = l.id_Libro)
     INNER JOIN autor a ON (a.id_Autor = al.id_Autor)
     WHERE l.nombre_Libro LIKE '%".$_POST['busca']."%' AND g.nombre_Genero ='".$_POST['genero']."' AND a.nombre LIKE 'Mary' AND e.nombre_Editorial ='".$_POST['nombreEditorial']."' ");
   }
   else{
   $result=mysqli_query($conexion, "SELECT l.id_Libro,l.id_Editorial,l.fecha_Lanzamiento,l.imagenTapaLibro,l.ISBN,l.capitulos,l.nombre_Libro
     FROM libro l 
     INNER JOIN generopertenecelibro gp ON (l.id_Libro= gp.id_Libro) 
     INNER JOIN genero g ON (g.id_Genero = gp.id_Genero) 
     INNER JOIN editorial e ON (e.id_Editorial = l.id_Editorial) 
     INNER JOIN autoreslibro al ON (al.id_Libro = l.id_Libro)
     INNER JOIN autor a ON (a.id_Autor = al.id_Autor)
     WHERE l.nombre_Libro LIKE '%%' AND g.nombre_Genero = '".$_POST['genero']."' AND a.nombre LIKE 'Mary' AND e.nombre_Editorial = '".$_POST['nombreEditorial']."' ");
   }
	return $result;
	exit;

}
?>

