<table cellpadding="1"cellspacing="5">
    <td align="center">ID Persona</td>
    <td align="center">ID Producto</td>
    <td align="center">Fecha de compra</td>
    <td align="center" colspan=2>Acciones</td>
    <?php foreach ($resultados as $resultado): ?>
        <tr>
            <td><?= $resultado['id'] ?></td>
            <td><?= $resultado['nombre'] ?></td>
            <td><?= $resultado['descripcion'] ?></td>
            <td><?= $resultado['stock'] ?></td>
            <td><a href=<?= $config['APP_Controller'] . "/eliminar.php?Listar=" . $_GET['Listar'] . "&id=" . $resultado['id'] ?>>Eliminar</a></td>
            <td><a href=<?= $config['APP_Controller'] . "/modificar.php?Listar=" . $_GET['Listar']  . "&id=" . $resultado['id'] ?>>Modificar</a></td>
        </tr>
    <?php endforeach; ?>
</table>