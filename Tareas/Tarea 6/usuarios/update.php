<?php
include '../conexion.php';

$id = $_POST['id'];
$email = $_POST['email'];
$password = $_POST['password'];
$nivel = $_POST['nivel'];

$sql = "UPDATE usuarios SET email='$email', password='$password', nivel='$nivel' WHERE id=$id";
$con->query($sql);
header('Location: read.php');