<table cellpadding="1"cellspacing="5">
    <td align="center">Nombre</td>
    <td align="center">Descripcion</td>
    <td align="center">Stock</td>
    <td align="center" colspan=2>Acciones</td>
    <?php foreach ($resultados as $resultado): ?>
        <tr>
            <td><?= $resultado['nombre'] ?></td>
            <td><?= $resultado['descripcion'] ?></td>
            <td><?= $resultado['stock'] ?></td>
            <td><a href=<?= $config['APP_Controller'] . "/eliminar.php?Listar=" . $_GET['Listar'] ?>>Eliminar</a></td>
            <td><a href=<?= $config['APP_Controller'] . "/modificar.php?Listar=" . $_GET['Listar'] ?>>Modificar</a></td>
        </tr>
    <?php endforeach; ?>
</table>