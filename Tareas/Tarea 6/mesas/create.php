<?php
include '../conexion.php';
$numero_mesa = $_POST['numero_mesa'];
$id_departamento = $_POST['id_departamento'];
$id_municipio = $_POST['id_municipio'];
$id_lugar = $_POST['id_lugar'];
$id_recinto = $_POST['id_recinto'];
$sql = "INSERT INTO mesas(numero_mesa, id_departamento, id_municipio, id_lugar, id_recinto) 
VALUES ($numero_mesa, $id_departamento, $id_municipio, $id_lugar, $id_recinto)";
$con->query($sql);
header('Location: read.php');