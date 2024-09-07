<?php
include '../conexion.php';
$id = $_GET['id'];
$sql = "DELETE FROM mesas WHERE id=$id";
$con->query($sql);
header('Location: read.php');