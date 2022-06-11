<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>
</head>
<body>

    <?php if(isset($_GET['agregado']) && $_GET['agregado'] === "true" ) :?>
        <div>La compra fue ingresada</div>
    <?php endif;?>

    <?php if(isset($_GET['agregado']) && $_GET['agregado'] === "false" ) :?>
        <div>Ha ocurrido un problema</div>
    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "true" ) :?>
        <div>La compra fue eliminada</div>
    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "false" ) :?>
        <div>Ha ocurrido un problema</div>
    <?php endif;?>

    <?php if(isset($_GET['modificado']) && $_GET['modificado'] === "true" ) :?>
        <div>La compra fue modificada</div>
    <?php endif;?>

    <?php if(isset($_GET['modificado']) && $_GET['modificado'] === "false" ) :?>
        <div>Ha ocurrido un problema</div>
    <?php endif;?>


    <?php 

        require_once "config.php";

        $resultado = null;

        if (isset($_GET['id'])){
            $conexion = new mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
            $sql = "SELECT p.*, c.id_producto, pr.nombre AS nombre_producto, pr.descripcion, c.fecha_hora 
            FROM persona p, producto pr, compra c 
            WHERE p.id= c.id_persona AND pr.id = c.id_producto AND p.id =" . $_GET['id'];
            $resultado = $conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);
        }

        if($resultado) foreach($resultado as $fila) :
    ?>
        <b>ID:</b>  <?=$fila['id']?> 
        <b>Nombre:</b>  <?=$fila['nombre']?> 
        <b>Descripcion:</b> <?=$fila['descripcion']?>
        <b>Fecha y Hora:</b> <?=$fila['fecha_hora']?>
        <a href="./eliminarCompra.php?producto=<?=$fila['id_producto']?>&persona=<?=$fila['id']?>&fecha=<?=$fila['fecha_hora']?>">Eliminar</a>
        <a href="./vistaComprasModificar.php?id=<?=$fila['id']/*Ver que modificar*/?>">Modificar</a>

        <br />
        
        <?php endforeach; ?>

</body>
</html>