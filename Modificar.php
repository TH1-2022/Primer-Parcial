<?php
session_start();
$_SESSION["idproducto"] = $_GET['idproducto']; 
$_SESSION["fecha"] = $_GET['fecha'];
$_SESSION["id_persona"] = $_GET['idpersona'];
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

    <h1>Modificar Pedido</h1>
    <p> Para modificar los datos presionar el boton Modificar </p>

    <form action="Control/ModificarCompra.php" method="post">
        Cliente: <br>
        <input checked type="radio" name="id" value=<?= $_GET['idpersona']?>><label><?php echo $_GET['nombre'];?> </label><br><br>
        <label>Articulo: </label><br>
        <input type="radio" name="compra" value=1 <?php if($_GET['idproducto'] == 1){?> checked <?php } ?> ><label>Moto</label><br>
        <input type="radio" name="compra" value=2 <?php if($_GET['idproducto'] == 2){?> checked <?php } ?> ><label>Auto</label><br>
        <input type="radio" name="compra" value=3 <?php if($_GET['idproducto'] == 3){?> checked <?php } ?> ><label>Caballo</label><br>
        <input type="radio" name="compra" value=4 <?php if($_GET['idproducto'] == 4){?> checked <?php } ?> ><label>Bicicleta</label><br><br>
        <input type="submit" value="Modificar">
    </form>

</body>

</html>