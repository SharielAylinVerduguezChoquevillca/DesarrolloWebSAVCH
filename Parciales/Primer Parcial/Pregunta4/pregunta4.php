<?php
$conn = new mysqli("localhost", "root", "", "bd_banco");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$order_by = isset($_GET['ordenar_por']) ? $_GET['ordenar_por'] : 'nombres';
$sql = "SELECT * FROM usuarios ORDER BY $order_by";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta 4</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #b50000;
            color: white;
            cursor: pointer;
        }
        .highlight {
            background-color: #FFC000;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th onclick="ordenar('nombres')">Nombres</th>
                <th onclick="ordenar('apellidos')">Apellidos</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                $highlight = ($row['nombres'] == 'Juan' && $row['apellidos'] == 'Perez') ? 'highlight' : '';
                echo "<tr class='$highlight'>
                        <td>{$row['nombres']}</td>
                        <td>{$row['apellidos']}</td>
                        <td><a href='form_editar_correp.php?correo={$row['correo']}'>{$row['correo']}</a></td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        function ordenar(columna) {
            window.location.href = "pregunta4.php?ordenar_por=" + columna;
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
