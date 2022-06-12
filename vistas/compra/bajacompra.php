<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv = "refresh" content = "0; url = listarcompra.php" />
    <title>Document</title>
</head>
<body>
    
    <?php

        require "../../utils/autoload.php";

        $id_persona = $_GET['id_persona'];
        $id_producto = $_GET['id_producto'];
        $fecha_hora = $_GET['fecha_hora'];
        
        CompraControlador::Eliminar($id_persona, $id_producto, $fecha_hora);

    ?>

</body>
</html>