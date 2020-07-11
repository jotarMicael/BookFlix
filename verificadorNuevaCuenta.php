<?php 
	session_start();
	include('conexion.php');
	//date_default_timezone_set('America');

	if(empty($_POST['unEmail'])){
		$_SESSION['error'] = "No se ingreso un mail";
		header('Location: NuevaCuenta.php');
		exit;
	}
	if(!preg_match('/\w+@\w+\.+[a-z]/', $_POST['unEmail'])){
      $_SESSION['error'] = "El Email ingresado es erroneo";
      header('Location: NuevaCuenta.php');
      exit;
	}
    if(empty($_POST['unNombre'])){
	   $_SESSION['error'] = "No se ingreso un nombre";
	   header('Location: NuevaCuenta.php');
       exit;
    }
    if(!preg_match('/^[a-zA-Z]+$/',$_POST['unNombre'])){
      $_SESSION['error'] = "El nombre solo debe contener letras";
      header('Location: NuevaCuenta.php');
      exit;
	}
	if(empty($_POST['unApellido'])){
       $_SESSION['error'] = "No se ingreso un apellido";
	   header('Location: NuevaCuenta.php');
	   exit;
	}
	if(!preg_match('/^[a-zA-Z]+$/',$_POST['unApellido'])){
      $_SESSION['error'] = "El apellido ingresado solo debe contener letras";
      header('Location: NuevaCuenta.php');
      exit;
	}
		if(empty($_POST['unUsuario'])){
		$_SESSION['error'] = "No se ingreso un usuario";
		header('Location: NuevaCuenta.php');
		exit;
	}
	if(empty($_POST['unContraseña'])){
       $_SESSION['error'] = "No se ingreso una contraseña";
	   header('Location: NuevaCuenta.php');
	   exit;
	}
	if((strlen($_POST['unContraseña'])<6)||(strlen($_POST['unContraseña'])>30)){
      $_SESSION['error'] = "La contraseña debe tener entre 6 y 30 caracteres";
      header('Location: NuevaCuenta.php');
      exit;
	}
	if(!preg_match('/[a-z]+/',$_POST['unContraseña'])){
      $_SESSION['error'] = "La contraseña debe tener al menos una minuscula";
      header('Location: NuevaCuenta.php');
      exit;
	}
	if(!preg_match('/[A-Z]+/',$_POST['unContraseña'])){
      $_SESSION['error'] = "La contraseña debe tener al menos una mayuscula";
      header('Location: NuevaCuenta.php');
      exit;
	}
    if(!preg_match('/[^a-zA-Z]/', $_POST['unContraseña'])){
      $_SESSION['error'] = "La contraseña debe tener al menos un caracter especial o un numero";
      header('Location: NuevaCuenta.php');
      exit;
	}
	if(empty($_POST['unContraseña2'])){
       $_SESSION['error'] = "No se ingreso una confirmacion de contraseña";
	   header('Location: NuevaCuenta.php');
	   exit;
	}
    if(!($_POST['unContraseña'])==($_POST['unContraseña2'])){
       $_SESSION['error'] = "La contraseña nueva y la repeticion de la misma no coinciden";
	   header('Location: NuevaCuenta.php');
	   exit;
	}
	if(strlen($_POST['unN°Tarjeta'])<>16){
		$_SESSION['error'] = "El numero de la tarjeta debe ser de 16 digitos";
		header('Location: NuevaCuenta.php');
		exit;
	 }
	 if(strlen($_POST['unCodigo'])<>3){
		$_SESSION['error'] = "El codigo de seguridad debe ser de 3 digitos";
		header('Location: NuevaCuenta.php');
		exit;
	 }

	 
	 $actual = date('Y-m-d');
	 $expiracion =$_POST['unVencimiento'];
	 $expiracion= date("Y-m-d", strtotime($expiracion));

	 if($actual>$expiracion){
		$_SESSION['error'] = "Tarjeta vencida";
		header('Location: NuevaCuenta.php');
		exit;

	 }

	 $result15=mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentausuario WHERE numero_Tarjeta = '".$_POST['unN°Tarjeta']."' ");
	 if(mysqli_num_rows($result15)==1){
		$_SESSION['error'] = "Esta tarjeta ya ha sido utilizada en otra cuenta";
		header('Location: NuevaCuenta.php');
		exit;
	 }


	$validar=mysqli_num_rows(mysqli_query($link, "SELECT * FROM cuenta WHERE email = '" . $_POST['unEmail'] . "' or nombre_Usuario = '" . $_POST['unUsuario'] . "' "));

	if(!$validar){
		mysqli_query($conexion, "INSERT INTO cuenta (nombre_Usuario, nombre,apellido, contraseña, email)VALUES ('" . $_POST['unUsuario'] . "', '" . $_POST['unNombre'] . "',  '" . $_POST['unApellido'] . "' ,'" . $_POST['unContraseña'] . "' ,'" . $_POST['unEmail'] . "')");
		mysqli_query($conexion, "INSERT INTO cuentausuario (nombre_Usuario, numero_Tarjeta, codigo_Seguridad,nombre_Tarjeta,apellido_Tarjeta)VALUES ('" . $_POST['unUsuario'] . "', '" . $_POST['unN°Tarjeta'] . "', '" . $_POST['unCodigo'] . "', '" . $_POST['unNombreTar']. "','" . $_POST['unApellidoTar']. "')");
		mysqli_query($conexion, "INSERT INTO cuentausuariotipobasica (nombre_Usuario , fecha_Vencimiento)VALUES ('" . $_POST['unUsuario'] . "','" . $_POST['unVencimiento'] . "')");

		$result = mysqli_query($conexion, "SELECT * FROM cuenta WHERE nombre_Usuario = '" . $_POST['unUsuario'] . "' ");

		$_SESSION['usuario']= mysqli_fetch_array($result);
    	$_SESSION['usuario']['id'] = mysqli_insert_id($conexion);
    	header('Location: verYCrearPerfiles.php');
    	exit;
 
    }
    else
    	$_SESSION['error']= "Cuenta ya existente";
    	header("Location: NuevaCuenta.php");
    	exit;
?>