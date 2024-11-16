<?php
$con = new mysqli("localhost", "root", "root", "bd_biblioteca");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT id, editorial FROM editoriales";
$result = $conn->query($sql);

$options = "";
while ($row = $result->fetch_assoc()) {
    $options .= "<option value='{$row['id']}'>{$row['editorial']}</option>";
}
echo $options;

$conn->close();
?>
