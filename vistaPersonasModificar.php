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
    require_once "conexion.php";

    $sql = "SELECT * FROM persona WHERE id =" . $_GET['id'];
    $resultado = ejcutarSentenciaDevuelveResultado($sql,1)[0];

?>

<form action="./modificarPersona.php" method="post">
    ID: <input type="text" name="id" value="<?= $resultado['id'] ?>" readonly> <br />
    Nombre: <input type="text" name="nombre" value="<?= $resultado['nombre'] ?>" > <br />
    Apellido: <input type="text" name="apellido" value="<?= $resultado['apellido'] ?>" > <br />
    Telefono: <input type="number" name="telefono" value="<?= $resultado['telefono'] ?>" > <br />
    Email: <input type="email" name="email" value="<?= $resultado['email'] ?>" > <br />
    <button type="submit" name="submit" value="Modificar">Modificar</button>
</form>

</body>
</html>