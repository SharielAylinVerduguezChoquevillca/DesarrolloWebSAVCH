<?php
$id = $_GET['id'];
include '../conexion.php';
$sql = "SELECT * FROM usuarios WHERE id = $id";
$resultado = $con->query($sql);
$usuario = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $usuario['email'] ?>" /><br />
        <label>Contraseña</label>
        <input type="password" name="password" /><br />
        <label>Nivel</label>
        <select name="nivel">
            <option value="1" <?php echo $usuario["nivel"] == 1 ? "selected" : "" ?>>Administrador</option>
            <option value="0" <?php echo $usuario["nivel"] == 0 ? "selected" : "" ?>>Usuario</option>
        </select><br />
        <button type="submit">Crear</button>
    </form>
</body>

</html>