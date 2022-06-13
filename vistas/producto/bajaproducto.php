<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja producto</title>
</head>
<body>
    
    <?php

        require "../../utils/autoload.php";

        $id = $_GET['id'];
        
        if (ProductoControlador::Eliminar($id) === false)
        {
            echo "No se puede eliminar el producto</br></br>";
        } else {
            echo "Producto eliminado</br></br>";
        }

    ?>

    <a href="listarproducto.php">Volver</a></br></br>

</body>
</html>