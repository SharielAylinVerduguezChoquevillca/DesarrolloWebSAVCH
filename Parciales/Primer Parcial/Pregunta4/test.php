<?php
$conexion = new mysqli("localhost", "root", "root");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
echo "Conexión exitosa";
?>
