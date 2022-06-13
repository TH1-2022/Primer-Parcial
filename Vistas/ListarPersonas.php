<table border=1 cellpadding="1"cellspacing="5">
    <td align="center">ID</td>
    <td align="center">Nombre</td>
    <td align="center">Apellido</td>
    <td align="center">Telefono</td>
    <td align="center">Email</td>
    <td align="center" colspan=2>Acciones</td>
    <?php foreach ($resultados as $resultado): ?>
        <tr>
            <form action=<?=$config['Controllers'] . "/modificar.php?Listar=" . $_GET['Listar']?> method="post">
                <td><input type="text" name="id" value="<?= $resultado['id'] ?>" size="5" readonly></td>
                <td><input type="text" name="nombre" value="<?= $resultado['nombre'] ?>" size="40"></td>
                <td><input type="text" name="apellido" value="<?= $resultado['apellido'] ?>" size="40"></td>
                <td><input type="tel" name="telefono" value="<?= $resultado['telefono'] ?>" size="10" maxlength="9"></td>
                <td><input type="email" name="email" value="<?= $resultado['email'] ?>" size="60"></td>
                <td><input type="button" value="Eliminar" onClick="location.href='<?= $config['Controllers'] . '/eliminar.php?Listar=' . $_GET['Listar'] . '&id=' . $resultado['id']; ?>'"></td>
                <td><input type="submit" value="Modificar"></td>
            </form>
        </tr>
    <?php endforeach; ?>
    <tr>
        <form action=<?=$config['Controllers'] . "/agregar.php?Listar=" . $_GET['Listar']?> method="post">
        <td><input type="text" name="id" size="5" readonly></td>
            <td><input type="text" name="nombre" size="40"></td>
            <td><input type="text" name="apellido" size="40"></td>
            <td><input type="tel" name="telefono" size="10" maxlength="9"></td>
            <td><input type="email" name="correo" size="60"></td>
            <td align="center" colspan=2><input type="submit" value="Agregar"></td>
        </form>    
    </tr>
</table>