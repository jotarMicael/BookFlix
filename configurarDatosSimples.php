<?php
	session_start(); 
	include('conexion.php');

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$cuenta = $_POST['cuenta'];

	if( (!empty($nombre)) and (preg_match('/^[a-zA-Z]+$/',$nombre)) ){
		if( (!empty($apellido)) and (preg_match('/^[a-zA-Z]+$/',$apellido)) ){
				if( (!empty($cuenta)) and (preg_match('/\w+@\w+\.+[a-z]/', $cuenta)) ){
						$verificar = mysqli_query ($conexion,"SELECT nombre_Usuario FROM cuenta WHERE (cuenta = '$cuenta') AND (id != '". $_SESSION['usuario']['id_Cuenta']."') " );
						if(mysqli_num_rows($verificar)== 0){

						$consulta = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', email = '$cuenta' WHERE id = '" . $_SESSION['usuario']['id'] . "' ";

						mysqli_query($conexion, $consulta);

						if(!empty($_FILES['unImagen']['tmp_name'])){
							$fotocontenido= addslashes(file_get_contents($_FILES['unImagen']['tmp_name']));
							$tipofoto=explode('/', $_FILES['unImagen']['type']);
							mysqli_query($conexion, "UPDATE usuarios SET foto_contenido = '$fotocontenido', foto_tipo = '$tipofoto[1]' WHERE id = '" . $_SESSION['usuario']['id'] . "' ");
	                    }

	                    $_SESSION['usuario']['nombre'] = $nombre;
	                    $_SESSION['usuario']['apellido'] = $apellido;
	                    $_SESSION['usuario']['cuenta'] = $cuenta;
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

