<?php
  session_start();
  unset($_SESSION["perfilImagen"]); 
  unset($_SESSION["perfilNombre"]);
  header("Location:verYCrearPerfiles.php");
  exit;
?>