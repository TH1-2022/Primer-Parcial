<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
</head>
<body>

<?php 
    require_once "config.php";

    $conexion = new mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
    $sql = "SELECT * FROM persona WHERE id =" . $_GET['id'];
    $resultado = $conexion -> query($sql)  -> fetch_all(MYSQLI_ASSOC)[0];

?>

<form action="./modificarPersona.php" method="post">
    ID: <input type="text" name="id" value="<?= $resultado['id'] ?>" readonly> <br />
    Nombre: <input type="text" name="nombre" value="<?= $resultado['nombre'] ?>" > <br />
    Apellido: <input type="text" name="apellido" value="<?= $resultado['apellido'] ?>" > <br />
    Telefono: <input type="number" name="telefono" value="<?= $resultado['telefono'] ?>" > <br />
    Email: <input type="email" name="email" value="<?= $resultado['email'] ?>" > <br />
    <input type="submit" value="Modificar">
</form>

</body>
</html>