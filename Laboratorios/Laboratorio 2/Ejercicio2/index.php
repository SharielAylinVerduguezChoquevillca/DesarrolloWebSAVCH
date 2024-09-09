<?php
session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['a'] = $_POST['a'];
    $_SESSION['b'] = $_POST['b'];
    $_SESSION['c'] = $_POST['c'];
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
</head>
<body>

<h1>Menú de Opciones</h1>
<ul>
    <li><a href="index.php?action=introducir">Introducir Datos</a></li>
    <li><a href="mostrar.php">Mostrar Cálculos</a></li>
</ul>

<?php

if (isset($_GET['action']) && $_GET['action'] == 'introducir') {
?>
    <h2>Introducir Valores de A, B y C</h2>
    <form method="POST" action="index.php">
        <label for="a">Valor A:</label>
        <input type="number" name="a" required><br>

        <label for="b">Valor B:</label>
        <input type="number" name="b" required><br>

        <label for="c">Valor C:</label>
        <input type="number" name="c" required><br>

        <input type="submit" value="Enviar">
    </form>
<?php
}
?>

</body>
</html>
