<?php session_start(); 
include('conexion.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="logotipo.jpg">
	<script type="text/javascript" src="scriptMostrar.js"></script>
	<script type="text/javascript" src="scriptConfirm.js"></script>
	<title>Detalle Del Capitulo</title>
</head>
<body background= "Imagenes/2.jpg">
	<h3 class="tituloTerciarioConfiguracion">
		<?php if (!empty($_SESSION['error'])){
    		echo $_SESSION['error'];
			unset($_SESSION['error']);} ?> </h3>
	<div class="barraInicio">	
		<div class="divBotones"> 
		<a class="botonInicio" href="Home.php?perfil=<?php echo $_GET['perfil'];?>&img=<?php echo $_GET['img'];?>"> Inicio </a>
	    </div>
	 </div>
	 <img class="imagenTitulo" src="Imagenes\Titulo.png">
			<h2 class="tituloSecundarioConfiguracion" > Nombre: "<?php echo $_GET["nCap"]?>" </h2>
			<div class="divConfiguracion">
				
				  <div class="registroConfiguracion">
					<?php     $sql2="SELECT sum(valor) FROM calificacion WHERE id_Libro='".$_GET['idLibro']."' AND nombre_Capitulo='".$_GET['nCap']."' ";
							  $result2=mysqli_query($conexion,$sql2);

							  $sql4="SELECT id_Calificacion FROM calificacion WHERE id_Libro='".$_GET['idLibro']."' AND nombre_Capitulo='".$_GET['nCap']."' ";
							  $result4=mysqli_query($conexion,$sql4);

							  foreach($result2 as $row)
							  $pr=($row['sum(valor)'])/(mysqli_num_rows($result4))
							 
							  
	  				?>
					<label class="labelWhite"> Este capitulo tiene una recomendacion promedio de <strong><?php echo $pr;?></strong> puntos por los usuarios que lo han leido. </label><br><br>
					<a href="leerLibro.php?&idLibro=<?php echo $_GET['idLibro'];?>&perfil=<?php echo $_GET['perfil'];?>&nCap=<?php echo $_GET['nCap'];?>" class="labelWhite"><strong> Leer: <?php
				 echo $_GET['nCap']."<br /> <br />"?></strong></a>
					
				  
				  
				
		   	</div>
			   </div>
				  <div class="divMargin">
			 <br> <br>
			 <?php 
			 	  $sql4= "SELECT id_ListaDeseos FROM listadeseos WHERE nombre_Libro='".$_GET['nLibro']."' AND id_Libro='".$_GET['idLibro']."' AND nombre_Perfil='".$_SESSION['perfilNombre']."' ";
				  $result4=mysqli_query($conexion,$sql4);
				  if( mysqli_num_rows($result4) == 1 ){
			 ?>	
			 	 <h3 class="tituloSecundarioConfiguracion" > Ya posees el libro completo en tu lista de deseos </h3>;
				  <?php }
				  else {	
			 	  $sql3= "SELECT id_ListaDeseos FROM listadeseos WHERE nombre_Capitulo= '".$_GET['nCap']."' AND id_Libro='".$_GET['idLibro']."' AND nombre_Perfil='".$_SESSION['perfilNombre']."' ";
				  $result3=mysqli_query($conexion,$sql3);
				  if( mysqli_num_rows($result3) <> 1 ){?>
					<form action="addListaDeseos.php" method="post" enctype="multipart/form-data" >
					<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
					<input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>">
					<input type="submit" class="boton" value="Agregar a lista de deseos"><br> 
				 	</form>  
					 <br>
			 <?php }
			 else{
				?>
				<h3 class="tituloSecundarioConfiguracion" > Ya posees este capitulo en tu lista de deseos </h3>
			 <?php }
			 }?>
				<form action="crearReseña.php" method="post" enctype="multipart/form-data" >
				<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
				<input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>">
				<input type="submit" class="boton" value="Dejar reseña"><br> 
				 </form>  
				 <br>
				  
			 <form action="listarReseñas.php" method="post" enctype="multipart/form-data" onclick="confirm()">
			 <input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			<input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>">
			<input type="submit" class="boton" value="Ver reseñas"><br> 
     		</form> 
			 </div>
			   <?php
				$sql2= "SELECT id_Capitulo FROM capitulo WHERE nombre_capitulo= '".$_GET['nCap']."' and id_Libro='".$_GET['idLibro']."' ";
  				$result2=mysqli_query($conexion,$sql2);
				$mostrar=mysqli_fetch_array($result2, MYSQLI_ASSOC);
				$result = mysqli_query($conexion, "SELECT nombre_Usuario FROM cuentaadministrador WHERE nombre_Usuario = '".$_SESSION['usuario']['nombre_Usuario']."' ");
				$result3 = mysqli_query($conexion, "SELECT nombre_Perfil FROM perfilleyocapitulo WHERE nombre_Perfil = '".$_SESSION['perfilNombre']."' and id_Capitulo = '".$mostrar['id_Capitulo']."'  ");
				if((mysqli_num_rows($result) == 0)&&(mysqli_num_rows($result3) == 0)){
					$_SESSION['idC']=$mostrar['id_Capitulo'];
					?>
			<div class="divMargin">
			<form action="finishCap.php?&nCap=<?php echo $_GET['nCap'];?>&perfil=<?php echo $_GET['perfil'];?>" method="post" enctype="multipart/form-data" onclick="confirm()">
			<input type="submit" class="boton" onclick="confirm()" value="Finalizar lectura"><br> 
     		</form> 
			</div>
			<?php }
			else{
				if(mysqli_num_rows($result) == 0){
			?>
			<form action="crearReseña.php" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			<input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>">
			<input type="submit" class="boton" value="Dejar reseña"><br> 
     		</form>
			 <div class="divMargin">
			 <br> <br>
			 <form action="crearCalificacion.php" method="post" enctype="multipart/form-data" onclick="confirm();">
			 <input type="hidden" name="idLibro" id="idLibro" value="<?php echo $_GET['idLibro'];?>">
			 <input type="hidden" name="nCap" id="nCap" value="<?php echo $_GET['nCap'];?>"> 
			 <input type="submit" class="boton" value="Calificar"><br> 
     		 </form> 
			 </div>
			 <?php } } ?>
	 </div>
		
	<div class="barraFin">
		<p class="textoBarra">Gutierrez Matias 15257/5 - Jotar Micael 15388/6 - Valentin Gallardo 15292/9</p>
    </div>
</body>
</html>