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
<body>
    <h1>MENU DE PRODCUTO</h1>

    <h2>En esta pagina se puede ingresar los datos de un producto.</h2>
    <br />

    <form action="/controladores/ProductoControlador.class.php?Menu=MPrA" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" > <br /><br />

        <label for="descripcion">Descripcion:</label>
        <input type="text" name="descripcion" id="descripcion"> <br /><br />

        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock"> <br /><br />

        <input type="submit" value="Enviar">
        <input type="button" onclick="history.back()" value="Volver">
    </form>

</body>
</html>