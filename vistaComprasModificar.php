<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
</head>
<body>

<?php 
    require_once "config.php";

    $id_persona = $_GET['persona'];
    $id_producto = $_GET['producto'];
    $fecha = $_GET['fecha'];

    $conexion = new mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
    $sql = "SELECT p.*, c.id_producto, pr.nombre AS nombre_producto, pr.descripcion, c.fecha_hora 
    FROM persona p, producto pr, compra c 
    WHERE p.id= c.id_persona AND pr.id = c.id_producto AND p.id = $id_persona AND pr.id = $id_producto AND fecha_hora = '$fecha';";
    $resultado = $conexion -> query($sql)  -> fetch_all(MYSQLI_ASSOC)[0];
?>

<form action="./modificarCompra.php" method="post">
    ID del Producto<input type="number" name="id" value="<?= $resultado['id_producto'] ?>" readonly> <br />
    Nombre del Producto <input type="text" name="nombre" value="<?= $resultado['nombre'] ?>" readonly> <br />
    Descripcion del Producto <input type="text" name="descripcion" value="<?= $resultado['descripcion'] ?>" readonly> <br />
    Email de la persona <input type="email" name="email" value="<?= $resultado['email'] ?>" readonly><br>
    Fecha y Hora de la compra <input type="datetime" name="fechaAc" value="<?= $resultado['fecha_hora'] ?>"><br>
    <input type="submit" value="Modificar">
    <input type="hidden" name="fechaAn" value="<?= $resultado['fecha_hora'] ?>"><br>
</form>

</body>
</html>