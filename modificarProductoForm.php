<?php
require_once("config.php");
$sql = "SELECT * FROM producto WHERE id =" . $_GET['id'];
$elemento = $db->query($sql)->fetch_all(MYSQLI_ASSOC)[0];

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

    <h1>Modificar Producto</h1>

    <form action="model/modificarProducto.php" method="post">
        <input type="hidden" name="id" value="<?php echo $elemento['id'] ?>">
        Nombre: <input type="text" name="nombre" value="<?php echo $elemento['nombre'] ?>"> <br>
        Descripción: <input type="text" name="descripcion" value="<?php echo $elemento['descripcion'] ?>"> <br>
        Stock: <input type="number" name="stock" value="<?php echo $elemento['stock'] ?>"> <br>

        <button type="submit">Modificar</button>
    </form>
    <a href="crearProducto.php">Volver</a>
</body>

</html>