<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php'); 
    require_once($config['APP_Controller'] . '/conectarBase.php');
    $sql = "SELECT * FROM persona";
    $resultado = $con -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
?>
ID: <input type="text" name="id" value="<?= $resultado['id'] ?>" readonly> <br />
Nombre: <input type="text" name="nombre" value="<?= $resultado['nombre'] ?>" > <br />
Apellido: <input type="text" name="apellido" value="<?= $resultado['apellido'] ?>" > <br />
Telefono: <input type="number" name="telefono" value="<?= $resultado['telefono'] ?>" > <br />
Email: <input type="email" name="email" value="<?= $resultado['email'] ?>" > <br />



<form action="/modificar.php" method="post">
    <table border=1 cellpadding="1"cellspacing="5">
        <td align="center">ID</td>
        <td align="center">Nombre</td>
        <td align="center">Apellido</td>
        <td align="center">Telefono</td>
        <td align="center">Email</td>
        <td align="center" colspan=2>Acciones</td>
        <?php foreach ($resultados as $resultado): ?>
            <tr>
                <td><input type="text" name="id" value="<?= $resultado['id'] ?>" readonly></td>
                <td><?= $resultado['nombre'] ?></td>
                <td><?= $resultado['apellido'] ?></td>
                <td><?= $resultado['telefono'] ?></td>
                <td><?= $resultado['email'] ?></td>
                <td><a href=<?= $config['Controllers'] . "/eliminar.php?Listar=" . $_GET['Listar'] . "&id=" . $resultado['id'] ?>>Eliminar</a></td>
                <td><a href=<?= $config['Controllers'] . "/modificar.php?Listar=" . $_GET['Listar']  . "&id=" . $resultado['id'] ?>>Modificar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="submit" value="Enviar">
</form>