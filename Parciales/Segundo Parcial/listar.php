<?php
$con = new mysqli("localhost", "root", "root", "bd_biblioteca");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM libros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Año</th>
                <th>Imagen</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['titulo']}</td>
                <td>{$row['autor']}</td>
                <td>{$row['anio']}</td>
                <td><img src='{$row['imagen']}' alt='{$row['titulo']}' style='max-width: 100px;'></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay libros registrados.";
}

$conn->close();
?>
