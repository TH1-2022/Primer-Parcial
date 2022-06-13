<table border=1>
    <td align="center">Nombre</td>
    <td align="center">Apellido</td>
    <td align="center">Telefono</td>
    <td align="center">Email</td>
    <td align="center" colspan=2>Acciones</td>
    <?php foreach ($resultados as $resultado): ?>
        <tr>
            <td><?= $resultado['nombre'] ?></td>
            <td><?= $resultado['apellido'] ?></td>
            <td><?= $resultado['telefono'] ?></td>
            <td><?= $resultado['email'] ?></td>
            <td><a href=<?= $config['APP_Controller'] . "/eliminar.php?Listar=" . $_GET['Listar'] ?>>Eliminar</a></td>
            <td><a href=<?= $config['APP_Controller'] . "/modificar.php?Listar=" . $_GET['Listar'] ?>>Modificar</a></td>
        </tr>
    <?php endforeach; ?>
</table>