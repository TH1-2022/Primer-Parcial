<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja compra</title>
</head>
<body>
    
    <?php

        require "../../utils/autoload.php";

        $id_persona = $_GET['id_persona'];
        $id_producto = $_GET['id_producto'];
        $fecha_hora = $_GET['fecha_hora'];
        
        if (false === CompraControlador::Eliminar($id_persona, $id_producto, $fecha_hora))
        {
            echo "No se puede eliminar a la compra</br></br>";
        }
        else
        {
            echo "Compra eliminada</br></br>";
        }

    ?>

    <a href="listarcompra.php">Volver</a></br></br>

</body>
</html>