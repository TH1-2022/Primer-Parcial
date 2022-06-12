<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="altaproducto.html">Ingresar producto</a></br></br>

    <?php 
        require "../../utils/autoload.php";
        
        $productos = ProductoControlador::Listar();

        foreach($productos as $producto){

            $id = $producto['id'];
            $nombre = $producto['nombre'];
            $descripcion = $producto['descripcion'];
            $stock = $producto['stock'];

            echo $id . " ";

            echo "<a href=modificarproducto.php?id=" . 
            $id . "&nombre=" . 
            $nombre . "&descripcion=" . 
            urlencode($descripcion) . "&stock=" . 
            $stock . ">modificar</a> ";

            echo "<a href=bajaproducto.php?id=" . 
            $id . ">borrar</a></br>";

            echo "Producto: " . $nombre . "</br>";
            echo "Descripcion: " . $descripcion .  "</br>";
            echo "Stock: " . $stock . "</br></br>";

        }
    ?>

</body>
</html>
