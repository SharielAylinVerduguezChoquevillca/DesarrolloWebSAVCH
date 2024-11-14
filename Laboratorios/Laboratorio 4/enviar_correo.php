<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $estado = $_POST['estado'];
    $bandeja = $_POST['bandeja'];

    if ($estado !== 'P' && $estado !== 'E') {
        die("Error: Estado inválido.");
    }

    $conn = new mysqli('localhost', 'root', 'root', 'bd_correo');
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO correos (bandeja, correo, asunto, mensaje, estado) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $bandeja, $correo, $asunto, $mensaje, $estado);

    if ($stmt->execute()) {
        echo "Correo enviado correctamente";
    } else {
        echo "Error al enviar el correo: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>


