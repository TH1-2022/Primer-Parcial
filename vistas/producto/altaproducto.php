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

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];

        if(ProductoControlador::Alta($nombre, $descripcion, $stock) === false){
            echo "No se puede ingresar el producto</br></br>";
        }else{
            echo "Producto ingresado</br></br>";
        }

    ?>

    <a href="listarproducto.php">Volver</a></br></br>

</body>
</html>