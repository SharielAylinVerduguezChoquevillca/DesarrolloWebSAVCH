<?php
session_start(); 
include 'conexion.php';


$usuario = $_POST['usuario'] ?? 'root';
$password = $_POST['password'] ?? 'root';


$passwordCifrada = sha1($password);


$sql = "SELECT id, usuario, nombrecompleto, nivel FROM usuarios WHERE usuario = ? AND password = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param('ss', $usuario, $passwordCifrada);
$stmt->execute();
$resultado = $stmt->get_result();


if ($resultado->num_rows > 0) {
    $user = $resultado->fetch_assoc();

    $_SESSION['nivel'] = $user['nivel'];

    echo json_encode([
        'success' => true,
        'id' => $user['id'],
        'usuario' => $user['usuario'],
        'nombrecompleto' => $user['nombrecompleto'],
        'nivel' => $user['nivel']
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']);
}


$stmt->close();
$con->close();
?>
