<?php
function resultadoBusqueda(){
	include('conexion.php');
   $busca=$_POST['busca'];
   $gen=$_POST['genero'];
   $edi=$_POST['nombreEditorial'];
   $result=NULL;
   $nm=$_POST['nombreCompletoAutor'];
   $nm=explode(" ", $nm);
   $nom=$nm[0];
   if(empty($_POST['busca'])){
    $busca='';
   }
   if(($_POST['genero'])=='Todos'){
      $gen='';
      
   }
   if(($_POST['nombreEditorial'])=='Todos'){
      $edi='';
   }
   if($_POST['nombreCompletoAutor']=='Todos'){
      $nm[0]='';
 }

   $result=mysqli_query($conexion, "SELECT DISTINCT l.id_Libro,l.id_Editorial,l.fecha_Lanzamiento,l.imagenTapaLibro,l.ISBN,l.capitulos,l.nombre_Libro
     FROM libro l 
     INNER JOIN generopertenecelibro gp ON (l.id_Libro= gp.id_Libro) 
     INNER JOIN genero g ON (g.id_Genero = gp.id_Genero) 
     INNER JOIN editorial e ON (e.id_Editorial = l.id_Editorial) 
     INNER JOIN autoreslibro al ON (al.id_Libro = l.id_Libro)
     INNER JOIN autor a ON (a.id_Autor = al.id_Autor)
     WHERE l.nombre_Libro LIKE '%$busca%' AND g.nombre_Genero LIKE '%$gen%' AND a.nombre LIKE '%$nm[0]%' AND e.nombre_Editorial LIKE '%$edi%' ");
	return $result;
	exit;

}
?>

