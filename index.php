<?php 
    require $_SERVER['DOCUMENT_ROOT'] . "/utils/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIENDA</title>
</head>
        <h1>MENU PRINCIPAL</h1>

        <h2>En esta pagina se puede realizar la compra de cualquier producto.</h2>
        <h3>Por favor, ingrese sus datos para tener un registro de sus compras.</h3>
        <br />

        <p><b>MENU DE CLIENTE</b></p>
        <a href="/presentaciones/MenuPersonaA.php">Agregar</a>
        <a href="/presentaciones/MenuPersonaEML.php">Eliminar/Modificar/Listar</a>
        <br /><br />

        <p><b>MENU DE PRODUCTO</b></p>
        <a href="/presentaciones/MenuProductoA.php">Agregar</a>
        <a href="/presentaciones/MenuProductoEML.php">Eliminar/Modificar/Listar</a>
        <br /><br />

        <p><b>MENU DE COMPRA</b></p>
        <a href="/presentaciones/MenuCompraA.php">Comprar</a>
        <a href="/presentaciones/MenuCompraL.php">Listar</a>
        <br /><br />
    </body>


</html>