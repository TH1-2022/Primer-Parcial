<?php

require_once("config.php");
$sql = "SELECT * FROM compra WHERE id_persona =" . $_GET['id_persona'] . " and id_producto=" . $_GET['id_producto'] . " and fecha_hora='" . $_GET['fecha_hora'] . "'";
$elemento = $db->query($sql)->fetch_all(MYSQLI_ASSOC)[0];
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

    <h1>Modificar Persona</h1>

    <form action="model/modificarCompra.php" method="post">
        <input type="hidden" name="fecha_hora" value="<?php echo $elemento['fecha_hora'] ?>">
        <input type="hidden" name="persona_old" value="<?php echo $elemento['id_persona'] ?>">
        <input type="hidden" name="producto_old" value="<?php echo $elemento['id_producto'] ?>">
        Persona:
        <select name="persona">
            <option value="" selected disabled>Seleccione</option>
            <?php foreach ($personas->fetch_all(MYSQLI_ASSOC) as $persona) { ?>
                <option value="<?php echo $persona['id'] ?>" <?php echo ($elemento['id_persona'] == $persona['id'] ? "selected" : "") ?>><?php echo $persona['id'] . " - " . $persona['nombre'] ?></option>
            <?php } ?>
        </select>
        <br>
        Producto:
        <select name="producto">
            <option value="" selected disabled>Seleccione</option>
            <?php foreach ($productos->fetch_all(MYSQLI_ASSOC) as $producto) { ?>
                <option value="<?php echo $producto['id'] ?>" <?php echo ($elemento['id_producto'] == $producto['id'] ? "selected" : "") ?>><?php echo $producto['id'] . " - " . $producto['nombre'] ?></option>
            <?php } ?>
        </select>
        <br>
        <button type="submit">Modificar</button>
    </form>
    <a href="crearCompra.php">Volver</a>
</body>

</html>