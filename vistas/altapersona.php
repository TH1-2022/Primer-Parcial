<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv = "refresh" content = "0; url = listarpersona.php" />
    <title>Document</title>
</head>
<body>
    
    <?php

    require "../utils/autoload.php";

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    PersonaControlador::Alta($nombre, $apellido, $telefono, $email);

    ?>

</body>
</html>