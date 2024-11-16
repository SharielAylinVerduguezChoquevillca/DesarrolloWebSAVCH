<?php
$con = new mysqli("localhost", "root", "root", "bd_biblioteca");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT id, carrera FROM carreras";
$result = $conn->query($sql);

$options = "";
while ($row = $result->fetch_assoc()) {
    $options .= "<option value='{$row['id']}'>{$row['carrera']}</option>";
}
echo $options;

$conn->close();
?>
