<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="altapersona.html">Ingresar persona</a></br></br>

    <?php 
        require "../../utils/autoload.php";
        
        $personas = PersonaControlador::Listar();

        foreach($personas as $persona){

            $id = $persona['id'];
            $nombre = $persona['nombre'];
            $apellido = $persona['apellido'];
            $telefono = $persona['telefono'];
            $email = $persona['email'];

            echo $id . " ";

            echo "<a href=modificarpersona.php?id=" . 
            $id . "&nombre=" . 
            $nombre . "&apellido=" . 
            $apellido . "&telefono=" . 
            $telefono . "&email=" . 
            $email . ">modificar</a> ";

            echo "<a href=bajapersona.php?id=" . 
            $id . ">borrar</a></br>";

            echo $nombre . " ";
            echo $apellido . "</br>";
            echo "Telefono: " . $telefono .  "</br>";
            echo "Email: " . $email . "</br></br>";

        }
    ?>

</body>
</html>
