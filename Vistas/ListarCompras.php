<table cellpadding="1"cellspacing="5">
    <td align="center">ID Persona</td>
    <td align="center">Nombre</td>
    <td align="center">Apellido</td>
    <td align="center">Telefono</td>
    <td align="center">Email</td>
    <td align="center">ID Producto</td>
    <td align="center">Nombre Producto</td>
    <td align="center">Descripcion</td>
    <td align="center">Stock</td>
    <td align="center">Fecha de compra</td>
    <td align="center" colspan=2>Acciones</td>
    <?php foreach ($resultados as $resultado): ?>
        <tr>
            <td><input type="text" name="idDePersona" value="<?= $resultado['idP'] ?>" size="5" readonly></td>
            <td><input type="text" name="nombre" value="<?= $resultado['nombreP'] ?>" size="20" readonly></td>
            <td><input type="text" name="apellido" value="<?= $resultado['apellido'] ?>" size="20" readonly></td>
            <td><input type="tel" name="telefono" value="<?= $resultado['telefono'] ?>" size="10" maxlength="9" readonly></td>
            <td><input type="email" name="email" value="<?= $resultado['email'] ?>" size="50" readonly></td>
            <td><input type="text" name="idDeProducto" value="<?= $resultado['idC'] ?>" size="5" readonly></td>
            <td><input type="text" name="nombre" value="<?= $resultado['nombreC'] ?>" size="20" readonly></td>
            <td><textarea name="descripcion" rows="<?= substr_count($resultado['descripcion'], "\n")+1 ?>" cols="50" wrap="soft" readonly><?= $resultado['descripcion'] ?></textarea></td>
            <td><input type="text" name="stock" value="<?= $resultado['stock'] ?>" size="5" readonly></td>
            <td><input type="datetime-local" name="fechaDeCompra" value="<?= date("Y-m-d\TH:i:s", strtotime($resultado['fecha_hora'])) ?>" step="1" readonly></td>
            <td align="center"><input type="button" value="Eliminar" onClick="location.href='<?= $config['Controllers'] . '/eliminar.php?Listar=' . $_GET['Listar'] . '&idP=' . $resultado['idP'] . '&idC=' . $resultado['idC'] . '&date=' . date("Y-m-d\TH:i:s", strtotime($resultado['fecha_hora'])) ?>'"></td>
        </tr>
    <?php endforeach; ?>
</table>
<table>
    <tr>
        <form action=<?=$config['Controllers'] . "/agregar.php?Listar=" . $_GET['Listar']?> method="post">
            <td><input type="text" name="idDePersona" size="5" maxlength="5"></td>
            <td><input type="text" name="idDeProducto" size="5" maxlength="5"></td>
            <td><input type="datetime-local" name="fechaDeCompra" step="1"></td>
            <td align="center"><input type="submit" value="Agregar"></td>
        </form>    
    </tr>
</table>
