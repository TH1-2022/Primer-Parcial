<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="altacompra.html">Ingresar compra</a></br></br>

    <?php 
        require "../../utils/autoload.php";
        
        $compras = CompraControlador::Listar();

        foreach($compras as $compra){

            $id_persona = $compra['id_persona'];
            $id_producto = $compra['id_producto'];
            $fecha_hora = $compra['fecha_hora'];
            $nombre_persona = $compra['nombre_persona'];
            $apellido_persona = $compra['apellido_persona'];
            $telefono_persona = $compra['telefono_persona'];
            $email_persona = $compra['email_persona'];
            $nombre_producto = $compra['nombre_producto'];
            $descripcion_producto = $compra['descripcion_producto'];
            $stock_producto = $compra['stock_producto'];

            echo "Persona: " . $id_persona . "</br>";
            echo "Producto: " . $id_producto . "</br>";
            echo "Fecha y hora: " . $fecha_hora . "</br>";

            echo "<a href=bajapersona.php?id_persona=" . 
            $id_persona . "&id_producto=" . 
            $id_producto . "&fecha_hora=" . 
            urlencode($fecha_hora) . 
            ">borrar</a></br></br>";

            echo "Comprador: " . $nombre_persona .  " ";
            echo $apellido_persona .  "</br>";
            echo "Telefono: " . $telefono_persona .  "</br>";
            echo "Email: " . $email_persona .  "</br></br>";
            echo "Producto: " . $nombre_producto .  "</br>";
            echo "Descripción : " . $descripcion_producto .  "</br>";
            echo "Stock actual : " . $stock_producto .  "</br></br></br></br>";

        }
    ?>

</body>
</html>
