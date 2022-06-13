<?php
require_once("config.php");
$listado = $db->query("SELECT * FROM producto");

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

    <h1>Listado Productos</h1>
    <table>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Stock</th>
        </tr>
        <?php foreach ($listado->fetch_all(MYSQLI_ASSOC) as $elemento) { ?>
            <tr>
                <td><?php echo $elemento['id'] ?></td>
                <td><?php echo $elemento['nombre'] ?></td>
                <td><?php echo $elemento['descripcion'] ?></td>
                <td><?php echo $elemento['stock'] ?></td>
                <td><a href="modificarProductoForm.php?id=<?php echo $elemento['id'] ?>">Modificar</a></td>
                <td><a href="model/eliminarProducto.php?id=<?php echo $elemento['id'] ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>
    <hr>
    <h2>Crear Producto</h2>
    <form action="model/insertarProducto.php" method="post">
        Nombre: <input type="text" name="nombre"> <br>
        Descrpción: <input type="text" name="descripcion"> <br>
        Stock:<input type="number" name="stock"> <br>
        <button type="submit">Crear</button>
    </form>
    <a href="index.php">Personas</a>
    <a href="crearCompra.php">Compra</a>
</body>

</html>