<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>
</head>
<body>
    
    <?php 

        require_once "config.php";
        require_once "conexion.php";

        $resultado = null;

        if (isset($_GET['id'])){
            $sql = "SELECT p.*, c.id_producto, pr.nombre AS nombre_producto, pr.descripcion, c.fecha_hora 
            FROM persona p, producto pr, compra c 
            WHERE p.id= c.id_persona AND pr.id = c.id_producto AND p.id =" . $_GET['id'];
            $resultado = ejcutarSentenciaDevuelveResultado($sql,1);
        }

        if($resultado) foreach($resultado as $fila) :
    ?>
        <b>ID:</b>  <?=$fila['id']?> 
        <b>Nombre:</b>  <?=$fila['nombre']?> 
        <b>Descripcion:</b> <?=$fila['descripcion']?>
        <b>Fecha y Hora:</b> <?=$fila['fecha_hora']?>
        <a href="./vistaCompras.php?id=<?=$fila['id_producto']?>">Volver a Comprar</a>
        <a href="./eliminarCompra.php?producto=<?=$fila['id_producto']?>&persona=<?=$fila['id']?>&fecha=<?=$fila['fecha_hora']?>">Eliminar</a>
        <a href="./vistaComprasModificar.php?producto=<?=$fila['id_producto']?>&persona=<?=$fila['id']?>&fecha=<?=$fila['fecha_hora']?>">Modificar</a>

        <br />
        
        <?php endforeach; ?>

        
    <?php if(isset($_GET[ALTA]) && $_GET[ALTA] === "true" ) :?>
        <div>La compra fue ingresada</div>
    <?php endif;?>

    <?php if(isset($_GET[ALTA]) && $_GET[ALTA] === "false" ) :?>
        <div>Ha ocurrido un problema</div>
    <?php endif;?>

    <?php if(isset($_GET[BAJA]) && $_GET[BAJA] === "true" ) :?>
        <div>La compra fue eliminada</div>
    <?php endif;?>

    <?php if(isset($_GET[BAJA]) && $_GET[BAJA] === "false" ) :?>
        <div>Ha ocurrido un problema</div>
    <?php endif;?>

    <?php if(isset($_GET[MODIFICACION]) && $_GET[MODIFICACION] === "true" ) :?>
        <div>La compra fue modificada</div>
    <?php endif;?>

    <?php if(isset($_GET[MODIFICACION]) && $_GET[MODIFICACION] === "false" ) :?>
        <div>Ha ocurrido un problema</div>
    <?php endif;?>

</body>
</html>