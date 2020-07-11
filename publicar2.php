<?php
	session_start();
	include("conexion.php");


	$sql= "SELECT texto FROM noticia WHERE texto ='".$_POST['publish']."' ";
	$result=mysqli_query($conexion,$sql);
					
	if(mysqli_num_rows($result)==1){
		$_SESSION['error'] = "Esta noticia ya se encuentra cargada en el sistema";
		header("Location:modificarNoticia.php");
	}
	else{

	if(empty($_POST['publish'])){
		$_SESSION['error'] = "No se puede publicar un mensaje vacio";
		header("Location: modificarNoticia.php");
		exit;
	}
	else{
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$fecha= date('Y-m-d H:i:s');

	if(strlen($_POST['publish'])>140){
		$_SESSION['error']="No se puede publicar un mensaje con mas de 140 caracteres";
		header("Location: modificarNoticia.php");
		exit;
	}
	else{
		$sql= "UPDATE noticia SET texto = '".$_POST['publish']."', fecha='$fecha' WHERE id_Noticia='".$_POST['idNoti']."' ";
		$_SESSION['error']="Noticia modificada correctamente";
		$result=mysqli_query($conexion,$sql);
		header("Location: Home.php");
	exit;
	}

}
}
?>
