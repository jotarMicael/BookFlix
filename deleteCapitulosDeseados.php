<?php 
                            include('conexion.php');
                            session_start();
                            $sql="DELETE FROM listadeseos WHERE '".$_POST['idLibro']."'=id_Libro AND '" .$_SESSION['perfilNombre']."'=nombre_Perfil AND ''=nombre_Libro AND '".$_POST['nCap']."'=nombre_Capitulo";
					        $result=mysqli_query($conexion,$sql);
                            $_SESSION['error']='Se ha eliminado de la lista de deseados';
                            header("Location:capitulosDeseados.php");
                            exit;
                    
				

			?>