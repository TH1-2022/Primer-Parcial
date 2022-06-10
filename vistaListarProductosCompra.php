<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
</head>
<body>
    <?php 

        require_once "config.php";

        $conexion = new mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        $sql = "SELECT * FROM producto";
        $resultado = $conexion -> query($sql);

        foreach($resultado -> fetch_all(MYSQLI_ASSOC) as $fila) :
    ?>
        <b>ID:</b>  <?=$fila['id']?> 
        <b>Nombre:</b>  <?=$fila['nombre']?> 
        <b>Descripcion:</b> <?=$fila['descripcion']?> 
        <b>Stock:</b> <?=$fila['stock']?>
        
        <a href="./altaCompra.php?id=<?=$fila['id']?>">Comprar</a>

        <br />
    <?php endforeach; ?>
</body>
</html>