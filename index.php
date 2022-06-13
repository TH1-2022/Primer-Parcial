<?php
require_once("config.php");
$listado = $db->query("SELECT * FROM persona");
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

    <h2>Listado Personas</h2>
    <table>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Email</th>
        </tr>
        <?php foreach ($listado->fetch_all(MYSQLI_ASSOC) as $elemento) { ?>


            <tr>
                <td><?php echo $elemento['id'] ?></td>
                <td><?php echo $elemento['nombre'] ?></td>
                <td><?php echo $elemento['apellido'] ?></td>
                <td><?php echo $elemento['telefono'] ?></td>
                <td><?php echo $elemento['email'] ?></td>
                <td><a href="modificarPersonaForm.php?id=<?php echo $elemento['id'] ?>">Modificar</a></td>
                <td><a href="model/eliminarPersona.php?id=<?php echo $elemento['id'] ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>
    <hr>
    <h2>Crear Persona</h2>
    <form action="model/insertarPersona.php" method="post">
        Nombre: <input type="text" name="nombre"> <br>
        Apellido: <input type="text" name="apellido"> <br>
        Teléfono: <input type="number" name="telefono"> <br>
        Email: <input type="email" name="email"> <br>

        <button type="submit">Crear</button>
    </form>
    <br> <br> <br> <br>

    <a href="crearProducto.php">Productos</a>
    <a href="crearCompra.php">Compra</a>
</body>

</html>