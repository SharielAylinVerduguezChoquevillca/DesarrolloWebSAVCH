<?php
include '../conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <form action="create.php" method="post">
        <label>Numero de mesa</label>
        <input type="number" name="numero_mesa" /><br />
        <label>Departamento</label>
        <select name="id_departamento">
            <?php
            $sql = "SELECT * FROM departamentos";
            $resultado = $con->query($sql);
            while ($departamento = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $departamento['id'] ?>"><?php echo $departamento['nombre'] ?></option>
            <?php } ?>
        </select><br />
        <label>Municipio</label>
        <select name="id_municipio">
            <?php
            $sql = "SELECT * FROM municipios";
            $resultado = $con->query($sql);
            while ($municipio = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $municipio['id'] ?>"><?php echo $municipio['nombre'] ?></option>
            <?php } ?>
        </select><br />
        <label>Lugar</label>
        <select name="id_lugar">
            <?php
            $sql = "SELECT * FROM lugares";
            $resultado = $con->query($sql);
            while ($lugar = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $lugar['id'] ?>"><?php echo $lugar['nombre'] ?></option>
            <?php } ?>
        </select><br />
        <label>Recinto</label>
        <select name="id_recinto">
            <?php
            $sql = "SELECT * FROM recinto";
            $resultado = $con->query($sql);
            while ($recinto = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $recinto['id'] ?>"><?php echo $recinto['nombre'] ?></option>
            <?php } ?>
        </select><br />
        <button type="submit">Crear</button>
    </form>
</body>

</html>