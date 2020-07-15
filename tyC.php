<?php
session_start();
include('conexion.php');
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");


readfile('pdfs/tyC.pdf');
?>