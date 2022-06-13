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

        require "../../utils/autoload.php";

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        if(PersonaControlador::Modificar($id, $nombre, $apellido, $telefono, $email) === false){
            echo "No se puede modificar a la persona</br></br>";
        }else{
            echo "Persona modificada</br></br>";
        }

    ?>

    <a href="listarpersona.php">Volver</a></br></br>

</body>
</html>