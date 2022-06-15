<?php 

$conexion = new mysqli("127.0.0.1","root","Pablo51965944","tiendita");
$sql = "SELECT * FROM persona";
$resultado = $conexion -> query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Ingreso y Datos de Persona</h1>

    <?php foreach($resultado -> fetch_all(MYSQLI_ASSOC) as $fila) :?>
            
        <b>ID:</b> <?=$fila['id']?>  
        <b>Nombre:</b>  <?=$fila['nombre']?> 
        <b>Apellido:</b> <?=$fila['apellido']?> 
        <b>Telefono:</b> <?=$fila['telefono']?> 
        <b>Email:</b>  <?=$fila['email']?> 
        
        <a href="bajaPersona.php?id=<?=$fila['id']?>">Eliminar</a>
        <a href="modificarPersona.php?id=<?=$fila['id']?>">Modificar</a>

        <br />

    <?php endforeach; ?>

    
    <br /> <br />
    <form action="insertarPersona.php" method="post">
        ID: <input type="text" name="id" > <br />
        Nombre: <input type="text" name="nombre" > <br />
        Apellido: <input type="text" name="apellido" > <br />
        Telefono: <input type="number" name="telefono" > <br />
        Email: <input type="email" name="email" > <br />

        <input type="submit" value="Enviar">
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

    <?php if(isset($_GET['modificado']) && $_GET['modificado'] === "true" ) :?>
        <div style="color: green;">La modificacion de datos fue correctamente realizada</div>
    <?php endif;?>

    <?php if(isset($_GET['modificado']) && $_GET['modificado'] === "false" ) :?>
        <div style="color: red;">Modificacion fallida, revice datos</div>
    <?php endif;?>


    <a href="../index.html">Volver</a></br>
</body>
</html>