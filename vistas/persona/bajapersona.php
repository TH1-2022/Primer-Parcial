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

        $id = $_GET['id'];
        if (PersonaControlador::Eliminar($id) === false){
            echo "No se puede eliminar a la persona</br></br>";
        }else{
            echo "Persona eliminada</br></br>";
        }

    ?>

    <a href="listarpersona.php">Volver</a></br></br>

</body>
</html>