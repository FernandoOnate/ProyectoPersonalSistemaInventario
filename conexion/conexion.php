<?php
$conexion = new mysqli("localhost", "root", "", "db_tienda");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    exit();
}
//echo $conexion->host_info . "\n";
?>