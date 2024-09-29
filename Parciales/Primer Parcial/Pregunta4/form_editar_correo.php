<?php
$conn = new mysqli("localhost", "root", "", "bd_banco");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$correo_actual = $_GET['correo'];
$sql = "SELECT * FROM usuarios WHERE correo='$correo_actual'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $usuario = $result->fetch_assoc();
} else {
    echo "Usuario no encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Correo</title>
    <style>
        .form-container {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #000080;
            background-color: #f0f8ff;
        }
        label, input {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3>Nombres y Apellidos: <?php echo $usuario['nombres'] . " " . $usuario['apellidos']; ?></h3>
        <form action="actualizar_correo.php" method="post">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" value="<?php echo $usuario['correo']; ?>" required>
            <input type="hidden" name="correo_actual" value="<?php echo $usuario['correo']; ?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>


