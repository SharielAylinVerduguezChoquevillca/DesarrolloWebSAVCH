<?php
include '../conexion.php';
$email = $_POST['email'];
$password = $_POST['password'];
$nivel = $_POST['nivel'];
$sql = "INSERT INTO usuarios(email, password, nivel) VALUES ('$email', SHA1('$password'), $nivel)";
$con->query($sql);
header('Location: read.php');