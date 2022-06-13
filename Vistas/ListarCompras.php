<table border=1 cellpadding="1"cellspacing="5">
    <td align="center">ID Persona</td>
    <td align="center">ID Producto</td>
    <td align="center">Fecha de compra</td>
    <td align="center" colspan=2>Acciones</td>
    <?php foreach ($resultados as $resultado): ?>
        <tr>
            <form action=<?=$config['Controllers'] . "/modificar.php?Listar=" . $_GET['Listar']?> method="post">
                <td><input type="text" name="idDePersona" value="<?= $resultado['id_persona'] ?>" size="5" readonly></td>
                <td><input type="text" name="idDeProducto" value="<?= $resultado['id_producto'] ?>" size="5" readonly></td>
                <td><input type="datetime-local" name="fechaDeCompra" value="<?= date("Y-m-d\TH:i:s", strtotime($resultado['fecha_hora'])) ?>" step="1"></td>
                <td><input type="button" value="Eliminar" onClick="location.href='<?= $config['Controllers'] . '/eliminar.php?Listar=' . $_GET['Listar'] . '&idP=' . $resultado['id_persona'] . '&idC=' . $resultado['id_producto'] . '&date=' . date("Y-m-d\TH:i:s", strtotime($resultado['fecha_hora'])) ?>'"></a></td>
                <td><input type="submit" value="Modificar"></a></td>
            </form>
        </tr>
    <?php endforeach; ?>
    <tr>
        <form action=<?=$config['Controllers'] . "/agregar.php?Listar=" . $_GET['Listar']?> method="post">
            <td><input type="text" name="idDePersona" size="5" maxlength="5"></td>
            <td><input type="text" name="idDeProducto" size="5" maxlength="5"></td>
            <td><input type="datetime-local" name="fechaDeCompra" step="1"></td>
            <td align="center" colspan=2><input type="submit" value="Agregar"></a></td>
        </form>    
    </tr>
</table>