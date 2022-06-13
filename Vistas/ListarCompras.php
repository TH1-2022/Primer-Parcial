<table border=1 cellpadding="1"cellspacing="5">
    <td align="center">ID Persona</td>
    <td align="center">ID Producto</td>
    <td align="center">Fecha de compra</td>
    <td align="center" colspan=2>Acciones</td>
    <?php foreach ($resultados as $resultado): ?>
        <tr>
            <td><?= $resultado['id_persona'] ?></td>
            <td><?= $resultado['id_producto'] ?></td>
            <td><?= $resultado['fecha_hora'] ?></td>
            <td><a href=<?= $config['Controllers'] . "/eliminar.php?Listar=" . $_GET['Listar'] . "&id=" . $resultado['id'] ?>>Eliminar</a></td>
            <td><a href=<?= $config['Controllers'] . "/modificar.php?Listar=" . $_GET['Listar']  . "&id=" . $resultado['id'] ?>>Modificar</a></td>
        </tr>
    <?php endforeach; ?>
</table>