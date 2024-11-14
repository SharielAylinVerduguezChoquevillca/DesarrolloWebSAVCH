<?php

$conexion = new mysqli("localhost", "root", "root", "bd_correo");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT id, correo, asunto, mensaje, estado FROM correos WHERE bandeja = 'entrada'";
$resultado = $conexion->query($sql);

$correos = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $correos[] = [
            'id' => $fila['id'],
            'correo' => $fila['correo'],
            'asunto' => $fila['asunto'],
            'estado' => $fila['estado'],
            'mensaje' => $fila['mensaje']
        ];
    }
    echo json_encode($correos);
} else {
    echo json_encode([]);
}

$conexion->close();
?>
