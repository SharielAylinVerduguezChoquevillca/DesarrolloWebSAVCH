<?php
include '../conexion.php';
$id = $_POST['id'];
$numero_mesa = $_POST['numero_mesa'];
$id_departamento = $_POST['id_departamento'];
$id_municipio = $_POST['id_municipio'];
$id_lugar = $_POST['id_lugar'];
$id_recinto = $_POST['id_recinto'];
$sql = "UPDATE mesas SET 
numero_mesa = $numero_mesa, 
id_departamento = $id_departamento, 
id_municipio = $id_municipio, 
id_lugar = $id_lugar, 
id_recinto = $id_recinto 
WHERE id = $id";
$con->query($sql);
header('Location: read.php');