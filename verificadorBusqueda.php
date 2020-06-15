<?php
function resultadoBusqueda(){
	include('conexion.php');
   $busca= $_POST['busca'];
   
   if(isset($busca)){
	   $result=mysqli_query($conexion, "SELECT *
     FROM libro l 
     INNER JOIN generopertenecelibro gp ON (l.id_Libro= gp.id_Libro) 
     INNER JOIN genero g ON (g.id_Genero = gp.id_Genero) 
     INNER JOIN editorial e ON (e.id_Editorial = l.id_Editorial) 
     INNER JOIN autoreslibro al ON (al.id_Libro = l.id_Libro)
     INNER JOIN autor a ON (a.id_Autor = al.id_Autor)
     WHERE l.nombre_Libro = '".$_POST['busca']."' OR g.nombre_Genero = '".$_POST['genero']."' OR a.nombre = '".$_POST['nombreAutorCompleto']."' OR e.nombre_Editorial = '".$_POST['nombreEditorial']."' ");
   }
   else{
      $sql3="SELECT * FROM autor,editorial,genero WHERE (editorial.nombre_Editorial LIKE '%%') AND (autor.nombre LIKE '%%') AND (genero.nombre_Genero LIKE '%%')  ";

   }
	return $result;
	exit;

}
?>

