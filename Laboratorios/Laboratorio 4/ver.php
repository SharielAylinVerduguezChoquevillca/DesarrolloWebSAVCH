<?php
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "root", "root", "bd_correo");
if ($conexion->connect_error) {
    echo json_encode(['error' => "Error de conexión: " . $conexion->connect_error]);
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {

    $sql = "SELECT mensaje FROM correos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        echo json_encode(['mensaje' => $fila['mensaje']]);
    } else {
        echo json_encode(['mensaje' => null, 'error' => "Mensaje no encontrado."]);
    }

    $stmt->close();
} else {
    echo json_encode(['mensaje' => null, 'error' => "ID inválido."]);
}

$conexion->close();
?>

