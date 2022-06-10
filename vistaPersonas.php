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
        $sql = "SELECT * FROM persona";
        $resultado = $conexion -> query($sql);

        foreach($resultado -> fetch_all(MYSQLI_ASSOC) as $fila) :
    ?>

        <b>ID:</b> <?=$fila['id']?>  
        <b>Nombre:</b>  <?=$fila['nombre']?> 
        <b>Apellido:</b> <?=$fila['apellido']?> 
        <b>Telefono:</b> <?=$fila['telefono']?> 
        <b>Email:</b>  <?=$fila['email']?> 
        
        <a href="./eliminarPersona.php?id=<?=$fila['id']?>">Eliminar</a>
        <a href="./modificarPersona.php?id=<?=$fila['id']?>">Modificar</a>

        <br />

    <?php endforeach; ?>

    <form action="./altaPersona.php" method="post"><br>
        Id <input type="number" name="id"><br>
        Nombre <input type="text" name="nombre"><br>
        Apellido <input type="text" name="apellido"><br>
        Telefono <input type="number" name="telefono"><br>
        Email <input type="email" name="email"><br>
        <button type="submit">Agregar</button>    
    </form>

    <?php if(isset($_GET['agregado']) && $_GET['agregado'] === "true" ) :?>
        <div>La persona fue ingresada</div>
    <?php endif;?>

    <?php if(isset($_GET['agregado']) && $_GET['agregado'] === "false" ) :?>
        <div>Ha ocurrido un problema</div>
    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "true" ) :?>
        <div>La persona fue eliminada</div>
    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "false" ) :?>
        <div>Ha ocurrido un problema</div>
    <?php endif;?>

    <?php if(isset($_GET['modificado']) && $_GET['modificado'] === "true" ) :?>
        <div>La persona fue modificada</div>
    <?php endif;?>

    <?php if(isset($_GET['modificado']) && $_GET['modificado'] === "false" ) :?>
        <div>Ha ocurrido un problema</div>
    <?php endif;?>

</body>
</html>