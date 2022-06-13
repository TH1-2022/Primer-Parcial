<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar compra</title>
</head>
<body>
    
    <?php

        require "../../utils/autoload.php";

        $id_persona = $_POST['id_persona'];
        $id_producto = $_POST['id_producto'];
        $fecha_hora = $_POST['fecha_hora'];
        $nueva_id_persona = $_POST['nueva_id_persona'];
        $nueva_id_producto = $_POST['nueva_id_producto'];
        $nueva_fecha_hora = $_POST['nueva_fecha_hora'];

        if(CompraControlador::Modificar($id_persona, $id_producto, $fecha_hora, 
        $nueva_id_persona, $nueva_id_producto, $nueva_fecha_hora) === false)
        {
            echo "No se puede modificar a la compra</br></br>";
        } else {
            echo "Compra modificada</br></br>";
        }

    ?>

    <a href="listarcompra.php">Volver</a></br></br>

</body>
</html>