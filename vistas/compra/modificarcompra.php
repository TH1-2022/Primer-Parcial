<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        $id_persona = $_GET['id_persona'];
        $id_producto = $_GET['id_producto'];
        $fecha_hora = $_GET['fecha_hora'];
    ?>

    <form action="modificarcompraingresar.php" method="post">
        ID Persona actual <input type="number" name="id_persona" value="<?= $id_persona ?>"readonly><br />
        ID Producto actual <input type="number" name="id_producto" value="<?= $id_producto ?>"readonly><br />
        Fecha y hora actual <input type="datetime-local" name="fecha_hora" value="<?= $fecha_hora ?>" step="1" readonly><br /><br />
        Nuevo ID Persona <input type="number" name="nueva_id_persona" value="<?= $id_persona ?>"><br />
        Nuevo ID Producto <input type="number" name="nueva_id_producto" value="<?= $id_producto ?>"><br />
        Nueva Fecha y hora <input type="datetime-local" name="nueva_fecha_hora" step="1" value="<?= $fecha_hora ?>"><br />
        <input type="submit" value="Modificar"></button>
    </form></br>

    <a href="listarcompra.php">Volver</a></br></br>
    
</body>
</html>