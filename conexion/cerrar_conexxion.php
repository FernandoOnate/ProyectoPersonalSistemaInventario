<?php
include("conexion.php");
//  Cierra la session y redirrecciona al archivo en vistas
session_start();
session_destroy();
$conexion->close();
header("location:../vistas/Login/login.php");
// matar la conexion
die();
?>