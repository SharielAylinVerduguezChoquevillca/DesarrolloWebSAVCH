<?php
include '../conexion.php';
$sql = "SELECT ME.id, ME.numero_mesa, D.nombre as departamento, MU.nombre as municipio, L.nombre as lugar, R.nombre as recinto FROM mesas ME
INNER JOIN departamentos D ON ME.id_departamento = D.id 
INNER JOIN municipios MU ON ME.id_municipio = MU.id
INNER JOIN lugares L ON ME.id_lugar = L.id
INNER JOIN recinto R ON ME.id_recinto = R.id";
$resultado = $con->query($sql);
?>
<table border="1">
    <tr>
        <th>Número de mesa</th>
        <th>Departamento</th>
        <th>Municipio</th>
        <th>Lugar</th>
        <th>Recinto</th>
        <th>Operaciones</th>
    </tr>
    <?php while ($mesa = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $mesa['numero_mesa']; ?></td>
            <td><?php echo $mesa['departamento']; ?></td>
            <td><?php echo $mesa['municipio'] ?></td>
            <td><?php echo $mesa['lugar'] ?></td>
            <td><?php echo $mesa['recinto'] ?></td>
            <td>
                <a href="form_update.php?id=<?php echo $mesa['id']; ?>">Editar</a>
                <a href="delete.php?id=<?php echo $mesa['id']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>
<a href="form_create.php">Registrar nuevo</a>