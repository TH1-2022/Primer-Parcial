<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <?php 

        require_once "config.php";

        $conexion = new mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        $sql = "SELECT * FROM producto";
        $resultado = $conexion -> query($sql);

        foreach($resultado -> fetch_all(MYSQLI_ASSOC) as $fila) :
    ?>

        <b>ID:</b> <?=$fila['id']?>  
        <b>Nombre:</b>  <?=$fila['nombre']?> 
        <b>Descripcion:</b> <?=$fila['descripcion']?> 
        <b>Stock:</b> <?=$fila['stock']?> 
        
        <a href="./eliminarProducto.php?id=<?=$fila['id']?>">Eliminar</a>
        <a href="./vistaProductosModificar.php?id=<?=$fila['id']?>">Modificar</a>

        <br />

    <?php endforeach; ?>

    <form action="./altaProducto.php" method="post"><br>
        Id <input type="number" name="id"><br>
        Nombre <input type="text" name="nombre"><br>
        Descripcion <input type="text" name="descripcion"><br>
        Stock <input type="number" name="stock"><br>
        <button type="submit">Agregar</button>
    </form>

    <?php if(isset($_GET['agregado']) && $_GET['agregado'] === "true" ) :?>
        <div>El producto fue ingresado</div>
    <?php endif;?>

    <?php if(isset($_GET['agregado']) && $_GET['agregado'] === "false" ) :?>
        <div>Ha ocurrido un problema</div>
    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "true" ) :?>
        <div>El producto fue eliminado</div>
    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "false" ) :?>
        <div>Ha ocurrido un problema</div>
    <?php endif;?>

    <?php if(isset($_GET['modificado']) && $_GET['modificado'] === "true" ) :?>
        <div>El producto fue modificado</div>
    <?php endif;?>

    <?php if(isset($_GET['modificado']) && $_GET['modificado'] === "false" ) :?>
        <div>Ha ocurrido un problema</div>
    <?php endif;?>

</body>
</html>