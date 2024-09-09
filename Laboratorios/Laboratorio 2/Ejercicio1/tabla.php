<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filas = intval($_POST['filas']);
    $columnas = intval($_POST['columnas']);

    echo "<h1>Tabla de $filas filas y $columnas columnas</h1>";
    echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse; text-align: center;'>";

    for ($i = $filas; $i >= 0; $i--) {
        echo "<tr>";
        for ($j = $columnas; $j >= 0; $j--) {
            if ($i == 0 && $j == 0) {
                echo "<td style='background-color: #ff0000; color: white;'></td>";
            } elseif ($i == 0) {
                echo "<td style='font-weight: bold; background-color: #ff0000; color: white;'>$j</td>";
            } elseif ($j == 0) {
                echo "<td style='font-weight: bold; background-color: #ff0000; color: white;'>$i</td>";
            } else {
                $resultado = $i * $j;
                echo "<td style='background-color: #ffffff;'>$resultado</td>";
            }
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se han recibido datos.";
}
?>


