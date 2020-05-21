<?php
	session_start(); 
	include('conexion.php');

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$cuenta = $_POST['cuenta'];

	if( (!empty($nombre))){
		if( (!empty($apellido))){
				if( (!empty($cuenta))){
						$verificar = mysqli_query ($conexion,"SELECT nombre_Usuario FROM cuenta WHERE (nombre_Usuario = '$cuenta') AND (id_Cuenta != '". $_SESSION['usuario']['id_Cuenta']."') " );
						if(mysqli_num_rows($verificar)== 0){

						$consulta = "UPDATE cuenta SET nombre = '$nombre', apellido = '$apellido', nombre_Usuario = '$cuenta' WHERE id_Cuenta = '" . $_SESSION['usuario']['id_Cuenta'] . "' ";

						mysqli_query($conexion, $consulta);

						$consulta = "UPDATE perfil SET nombre_Usuario = '$cuenta' WHERE nombre_Usuario = '" . $_SESSION['usuario']['nombre_Usuario'] . "' ";

						mysqli_query($conexion, $consulta);

						if(!empty($_FILES['unImagen']/*['tmp_name'])*/)){
							//$fotocontenido= addslashes(file_get_contents($_FILES['unImagen']['tmp_name']));
							$nombre_Imagen = $_FILES ['unImagen']['name'];
							//$tipofoto=explode('/', $_FILES['unImagen']['type']);
							$_SESSION['perfilImagen'] = $nombre_Imagen;
							mysqli_query($conexion, "UPDATE perfil SET imagen = '$nombre_Imagen' WHERE nombre_Perfil = '" . $_SESSION['perfilNombre'] . "' ");
							
	                    }

	                    $_SESSION['usuario']['nombre'] = $nombre;
	                    $_SESSION['usuario']['apellido'] = $apellido;
						$_SESSION['usuario']['nombre_Usuario'] = $cuenta;
	                    header("Location: Configuracion.php");
	                }
	                else{
	                	$_SESSION['error']="El email ya existe";
						header('Location: Configuracion.php');
	                }
	                }
	                else {
						$_SESSION['error']="Campo email incorrecto";
						header('Location: Configuracion.php');
					}
		}
		else {
			$_SESSION['error']="Campo apellido incorrecto";
			header('Location: Configuracion.php');
		}
	}
	else{
		$_SESSION['error']="Campo nombre incorrecto";
		header('Location: Configuracion.php');
	}	
?>

