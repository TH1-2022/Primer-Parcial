<?php

require_once("config.php");
$listado = $db->query("SELECT * FROM compra");
$personas = $db->query("SELECT * FROM persona");
$productos = $db->query("SELECT * FROM producto");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['title']; ?></title>
</head>

<body>

    <table>
        <tr>
            <th>Persona</th>
            <th>Producto</th>
            <th>Fecha</th>
        </tr>
        <?php foreach ($listado->fetch_all(MYSQLI_ASSOC) as $elemento) {
            $elemento_persona = $db->query("SELECT * FROM persona WHERE id =" . $elemento['id_persona'])->fetch_all(MYSQLI_ASSOC)[0];
            $elemento_producto = $db->query("SELECT * FROM producto WHERE id =" . $elemento['id_producto'])->fetch_all(MYSQLI_ASSOC)[0];
        ?>
            <tr>
                <td><?php echo $elemento_persona['nombre'] ?></td>
                <td><?php echo $elemento_producto['nombre'] ?></td>
                <td><?php $date = date_create($elemento['fecha_hora']);
                    echo date_format($date, "d/m/Y H:i:s"); ?></td>
                <td><a href="modificarCompraForm.php?id_persona=<?php echo $elemento['id_persona'] ?>&id_producto=<?php echo $elemento['id_producto'] ?>&fecha_hora=<?php echo $elemento['fecha_hora'] ?>">Modificar</a></td>
                <td><a href="model/eliminarCompra.php?id_persona=<?php echo $elemento['id_persona'] ?>&id_producto=<?php echo $elemento['id_producto'] ?>&fecha_hora=<?php echo $elemento['fecha_hora'] ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>
    <hr>
    <h2>Crear Compra</h2>
    <form action="model/insertarCompra.php" method="post">
        Persona:
        <select name="persona">
            <option value="" selected disabled>Seleccione</option>
            <?php foreach ($personas->fetch_all(MYSQLI_ASSOC) as $persona) { ?>
                <option value="<?php echo $persona['id'] ?>"><?php echo $persona['id'] . " - " . $persona['nombre'] ?></option>
            <?php } ?>
        </select>
        <br>
        Producto:
        <select name="producto">
            <option value="" selected disabled>Seleccione</option>
            <?php foreach ($productos->fetch_all(MYSQLI_ASSOC) as $producto) { ?>
                <option value="<?php echo $producto['id'] ?>"><?php echo $producto['id'] . " - " . $producto['nombre'] ?></option>
            <?php } ?>
        </select>
        <br>
        <button type="submit">Crear</button>
    </form>
    <a href="index.php">Personas</a>
    <a href="crearProducto.php">Productos</a>
</body>

</html>