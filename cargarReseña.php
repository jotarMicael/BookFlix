<?php 
				 include('conexion.php');
                 session_start();

				if (!empty($_POST['publish'])){
						if (empty($_POST['spoiler']))
							$_POST['spoiler']='No';
						else
							$_POST['spoiler']='Si';

						$fechaHora=date('Y-m-d g:ia');

						$sql2="SELECT id_Perfil FROM perfil where nombre_Usuario = '" .$_SESSION['usuario']['nombre_Usuario']."' AND nombre_Perfil='" .$_SESSION['perfilNombre']."' ";
						$result2=mysqli_query($conexion,$sql2);

						$mostrar19=mysqli_fetch_array($result2, MYSQLI_ASSOC);

						$sql= "INSERT INTO reseña(fechaHora,id_Perfil,id_Libro,spoiler,nombre_Capitulo,texto,reportada) VALUES ('$fechaHora','".$mostrar19["id_Perfil"]."','".$_POST['idLibro']."','".$_POST['spoiler']."','".$_POST['nCap']."','" .$_POST["publish"]."','No')";
						$result=mysqli_query($conexion,$sql);
						$_SESSION['error']='La reseña se ha cargado correctamente';
						header("Location:home.php");
						exit;

					
				}
				else{
                    $_SESSION['error']='Debe ingresar un texto';
                    header("Location:crearReseña.php");
                }
			?>