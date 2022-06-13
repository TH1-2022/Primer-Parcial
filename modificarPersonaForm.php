<?php
require_once("config.php");
$sql = "SELECT * FROM persona WHERE id =" . $_GET['id'];
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

    <h1>Modificar Persona</h1>

    <form action="model/modificarPersona.php" method="post">
        <input type="hidden" name="id" value="<?php echo $elemento['id'] ?>">
        Nombre: <input type="text" name="nombre" value="<?php echo $elemento['nombre'] ?>"> <br>
        Apellido: <input type="text" name="apellido" value="<?php echo $elemento['apellido'] ?>"> <br>
        Teléfono: <input type="number" name="telefono" value="<?php echo $elemento['telefono'] ?>"> <br>
        Email: <input type="email" name="email" value="<?php echo $elemento['email'] ?>"> <br>

        <button type="submit">Modificar</button>
    </form>
    <a href="index.php">Volver</a>
</body>

</html>