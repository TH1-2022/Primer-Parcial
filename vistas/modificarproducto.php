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
        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
        $descripcion = $_GET['descripcion'];
        $stock = $_GET['stock'];
    ?>

    <form action="modificarproductoingresar.php" method="post">
        ID <input type="text" name="id" value="<?= $id ?>"readonly><br />
        Nombre <input type="text" name="nombre" value="<?= $nombre ?>"><br />
        Descripcion <input type="text" name="descripcion" value="<?= $descripcion ?>"><br />
        Stock <input type="number" name="stock" value="<?= $stock ?>"><br />
        <input type="submit" value="Modificar"></button>
    </form>
    
</body>
</html>