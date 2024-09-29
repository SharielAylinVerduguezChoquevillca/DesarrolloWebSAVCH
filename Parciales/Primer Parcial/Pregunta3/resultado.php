<?php
session_start(); 

require 'operaciones.php'; 


if (!isset($_POST['operacion'])) {
    echo "Error: No se ha definido la operación.";
    exit();
}


$operaciones = new Operaciones($_SESSION['a'], $_SESSION['b']);


switch ($_POST['operacion']) {
    case 'sumar':
        $resultado = $operaciones->sumar();
        break;
    case 'restar':
        $resultado = $operaciones->restar();
        break;
    case 'multiplicar':
        $resultado = $operaciones->multiplicar();
        break;
    case 'dividir':
        $resultado = $operaciones->dividir();
        break;
    default:
        $resultado = "Operación no válida.";
}

echo "<h1>Resultado</h1>";
echo "<p>El resultado de la operación es: $resultado</p>";
?>
