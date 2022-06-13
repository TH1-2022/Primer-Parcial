<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta persona</title>
</head>
<body>
    
    <?php

        require "../../utils/autoload.php";

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        if (false === PersonaControlador::Alta($nombre, $apellido, $telefono, $email))
        {
            echo "No se puede ingresar a la persona</br></br>";
        }
        else
        {
            echo "Persona ingresada</br></br>";
        }

    ?>

    <a href="listarpersona.php">Volver</a></br></br>

</body>
</html>