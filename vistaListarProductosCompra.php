<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos para comprar</title>
</head>
<body>
    <?php 

        require_once "config.php";
        require_once "conexion.php";

        $sql = "SELECT * FROM producto";
        $resultado = ejcutarSentenciaDevuelveResultado($sql,1);

        foreach($resultado as $fila) :
    ?>
        <b>ID:</b>  <?=$fila['id']?> 
        <b>Nombre:</b>  <?=$fila['nombre']?> 
        <b>Descripcion:</b> <?=$fila['descripcion']?> 
        <b>Stock:</b> <?=$fila['stock']?>
        
        <a href="./vistaCompras.php?id=<?=$fila['id']?>">Comprar</a>

        <br />
    <?php endforeach; ?>

</body>
</html>