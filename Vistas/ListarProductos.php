<table border=1 cellpadding="1"cellspacing="5">
    <td align="center">ID Producto</td>
    <td align="center">Nombre</td>
    <td align="center">Descripcion</td>
    <td align="center">Stock</td>
    <td align="center" colspan=2>Acciones</td>
    <?php foreach ($resultados as $resultado): ?>
        <tr>
            <form action=<?=$config['Controllers'] . "/modificar.php?Listar=" . $_GET['Listar']?> method="post">
                <td><input type="text" name="id" value="<?= $resultado['id'] ?>" size="5" readonly></td>
                <td><input type="text" name="nombre" value="<?= $resultado['nombre'] ?>" size="40"></td>
                <td><textarea name="descripcion" rows="<?= substr_count($resultado['descripcion'], "\n")+1 ?>" cols="50" wrap="soft"><?= $resultado['descripcion'] ?></textarea></td>
                <td><input type="text" name="stock" value="<?= $resultado['stock'] ?>" size="5"></td>
                <td><input type="button" value="Eliminar" onClick="location.href='<?= $config['Controllers'] . '/eliminar.php?Listar=' . $_GET['Listar'] . '&id=' . $resultado['id']; ?>'"></td>
                <td><input type="submit" value="Modificar"></td>
            </form>
        </tr>
    <?php endforeach; ?>
    <tr>
        <form action=<?=$config['Controllers'] . "/agregar.php?Listar=" . $_GET['Listar']?> method="post">
            <td><input type="text" name="id" size="5"></td>
            <td><input type="text" name="nombre" size="40"></td>
            <td><textarea name="descripcion" rows="5" cols="50" wrap="soft"></textarea></td>
            <td><input type="text" name="stock" size="5"></td>
            <td align="center" colspan=2><input type="submit" value="Agregar"></td>
        </form>    
    </tr>
    
</table>