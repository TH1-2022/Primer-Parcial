<table border=1 cellpadding="1"cellspacing="5">
    <td align="center">ID Producto</td>
    <td align="center">Nombre</td>
    <td align="center">Descripcion</td>
    <td align="center">Stock</td>
    <td align="center" colspan=2>Acciones</td>
    <?php foreach ($resultados as $resultado): ?>
        <tr>
            <td><?= $resultado['id'] ?></td>
            <td><?= $resultado['nombre'] ?></td>
            <td><?= nl2br($resultado['descripcion']) ?></td>
            <td><?= $resultado['stock'] ?></td>
            <td><a href=<?= $config['Controllers'] . "/eliminar.php?Listar=" . $_GET['Listar'] . "&id=" . $resultado['id'] ?>>Eliminar</a></td>
            <td><a href=<?= $config['Controllers'] . "/modificar.php?Listar=" . $_GET['Listar']  . "&id=" . $resultado['id'] ?>>Modificar</a></td>
        </tr>
    <?php endforeach; ?>
</table>