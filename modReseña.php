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

						$sql= "UPDATE reseña SET texto = '".$_POST['publish']."',spoiler='".$_POST['spoiler']."' WHERE texto='".$_POST['texto2']."' AND id_Perfil='".$mostrar19['id_Perfil']."'";
                        $result=mysqli_query($conexion,$sql);
						$_SESSION['error']='La reseña se ha modificado correctamente';
                        header("Location:misReseñas.php");
                        exit();

					
				}
				else{
                    $_SESSION['error']='Debe ingresar un texto';
                    header("Location:modificarReseña.php");
                    exit();
                }
			?>