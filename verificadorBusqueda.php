<?php
function resultadoBusqueda(){
	include('conexion.php');
   $busca=$_POST['busca'];
   $result=NULL;
   $nm=$_POST['nombreCompletoAutor'];
   $nm=explode(" ", $nm);
   $nom=$nm[0];
   echo $_POST['genero'];
   if(empty($busca)){
    $busca='';
   }
   if(($_POST['genero'])=='Todos'){
      $_POST['genero']='';
   }
   if(($_POST['nombreEditorial'])=='Todos'){
      $_POST['nombreEditorial']='';
   }
   if(($nm[0])=='Todos'){
      $nm[0]='';
 }

   $result=mysqli_query($conexion, "SELECT l.id_Libro,l.id_Editorial,l.fecha_Lanzamiento,l.imagenTapaLibro,l.ISBN,l.capitulos,l.nombre_Libro
     FROM libro l 
     INNER JOIN generopertenecelibro gp ON (l.id_Libro= gp.id_Libro) 
     INNER JOIN genero g ON (g.id_Genero = gp.id_Genero) 
     INNER JOIN editorial e ON (e.id_Editorial = l.id_Editorial) 
     INNER JOIN autoreslibro al ON (al.id_Libro = l.id_Libro)
     INNER JOIN autor a ON (a.id_Autor = al.id_Autor)
     WHERE l.nombre_Libro LIKE '%".$busca."%' AND g.nombre_Genero LIKE '%".$_POST['genero']."%' AND a.nombre LIKE '$nm[0]' AND e.nombre_Editorial LIKE '%".$_POST['nombreEditorial']."%' ");
	return $result;
	exit;

}
?>

