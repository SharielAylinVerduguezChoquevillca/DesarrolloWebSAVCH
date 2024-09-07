<?php
include '../conexion.php';
$sql = "SELECT * FROM usuarios";
$resultado = $con->query($sql);
?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Nivel</th>
        <th>Operaciones</th>
    </tr>
    <?php while ($usuario = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td><?php echo $usuario['nivel'] == 0 ? "Usuario" : "Administrador" ?></td>
            <td>
                <a href="form_update.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                <a href="delete.php?id=<?php echo $usuario['id']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>
<a href="form_create.html">Registrar nuevo</a>