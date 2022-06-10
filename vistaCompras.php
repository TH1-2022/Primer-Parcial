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
        $sql = "SELECT * FROM producto WHERE id =" . $_GET['id'];
        $resultado = $conexion -> query($sql)  -> fetch_all(MYSQLI_ASSOC)[0];
        
    ?>

    <form action="./altaCompra.php" method="POST"><br>
        ID <input type="number" name="id" value="<?= $resultado['id'] ?>" readonly> <br />
        Nombre Producto <input type="text" name="nombre" value="<?= $resultado['nombre'] ?>" readonly> <br />
        Descripcion Producto <input type="text" name="descripcion" value="<?= $resultado['descripcion'] ?>" readonly> <br />
        Email <input type="email" name="email"><br>
        Fecha y Hora <input type="datetime-local" name="fecha_hora"><br>
        <button type="submit">Agregar</button>
    </form>

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

</body>
</html>