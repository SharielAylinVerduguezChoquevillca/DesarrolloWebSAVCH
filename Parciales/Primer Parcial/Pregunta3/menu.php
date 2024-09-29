<?php
session_start();
require 'operaciones.php';

if (!isset($_SESSION['a']) || !isset($_SESSION['b'])) {
    header("Location: pregunta3.html");
    exit();
}

$operaciones = new Operaciones($_SESSION['a'], $_SESSION['b']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Operaciones</title>
</head>
<body>
    <h1>Seleccione una operación:</h1>
    <form action="resultado.php" method="post">
        <input type="hidden" name="operacion" value="sumar">
        <input type="submit" value="Sumar">
    </form>
    <form action="resultado.php" method="post">
        <input type="hidden" name="operacion" value="restar">
        <input type="submit" value="Restar">
    </form>
    <form action="resultado.php" method="post">
        <input type="hidden" name="operacion" value="multiplicar">
        <input type="submit" value="Multiplicar">
    </form>
    <form action="resultado.php" method="post">
        <input type="hidden" name="operacion" value="dividir">
        <input type="submit" value="Dividir">
    </form>
</body>
</html>

