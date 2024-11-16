<?php
$conn = new mysqli("localhost", "root", "root", "bd_biblioteca");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$uploadDir = "imagenes/";

for ($i = 1; $i <= 3; $i++) {
    $titulo = $_POST["titulo$i"];
    $autor = $_POST["autor$i"];
    $anio = $_POST["anio$i"];
    $imagenName = $_FILES["imagen$i"]["name"];
    $imagenTmpName = $_FILES["imagen$i"]["tmp_name"];
    $imagenPath = $uploadDir . basename($imagenName);

    if (move_uploaded_file($imagenTmpName, $imagenPath)) {
        $sql = "INSERT INTO libros (titulo, autor, anio, imagen, ideditorial, idcarrera)
                VALUES ('$titulo', '$autor', $anio, '$imagenPath', 1, 1)";
        $conn->query($sql);
    } else {
        echo "Error al subir la imagen del libro $i.";
    }
}

$conn->close();
?>