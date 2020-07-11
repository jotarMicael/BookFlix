<?php 
			session_start(); 
            include('conexion.php');
				
                            $sql= "DELETE FROM perfil WHERE '".$_SESSION["perfilNombre"]."'=nombre_Perfil AND '". $_SESSION["usuario"]["nombre_Usuario"] ."'=nombre_Usuario ";
					        $result=mysqli_query($conexion,$sql);
							$_SESSION['error'] = 'Eliminado Correctamente';
							header("Location: verYCrearPerfiles.php");
							exit();
                


			?>