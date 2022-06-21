<?php 

$conexion = new mysqli("127.0.0.1","root","Pablo51965944","tiendita");
$sql = "SELECT * FROM compra";
$resultado = $conexion -> query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
</head>
<body>
    
    <h1>Ingreso y Datos de Compra</h1>

    <?php foreach($resultado -> fetch_all(MYSQLI_ASSOC) as $fila) :?>
            
        <b>ID Persona:</b> <?=$fila['id_persona']?>  
        <b>ID Producto:</b>  <?=$fila['id_producto']?> 
        <b>Hora:</b> <?=$fila['fecha_hora']?> 

        
        <a href="bajaCompra.php?id=<?=$fila['id_persona'],$fila['id_producto']?>">Eliminar</a>

        <br />

    <?php endforeach; ?>

    
    <br /> <br />
    <form action="insertarCompra.php" method="post">

        ID Persona <input type="number" name="id_persona"><br />
        ID Producto <input type="number" name="id_producto"><br />
        Fecha y hora <input type="datetime-local" name="fecha_hora" value="<?php echo date("Y-m-d\TH:i:s")?>"><br>
        <input type="submit" value="Ingresar"></button>
        
    </form>

    <?php if(isset($_GET['exito']) && $_GET['exito'] === "true" ) :?>
        <div style="color: green;">Se ingreso los datos correctamente.</div>
    <?php endif;?>

    <?php if(isset($_GET['exito']) && $_GET['exito'] === "false" ) :?>
        <div style="color: red;">Ingreso de datos no autorizado.</div>
    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "true" ) :?>
        <div style="color: green;">Datos eliminados con exito.</div>
    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "false" ) :?>
        <div style="color: red;">Accion no permitida o fallo de ingreso de datos.</div>
    <?php endif;?>


<a href="../index.html">Volver</a></br>

</body>
</html>