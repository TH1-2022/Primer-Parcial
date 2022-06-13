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
    <h1>MENU DE CLIENTE</h1>

    <h2>En esta pagina se puede ingresar los datos de un cliente.</h2>
    <br />

    <form action="/controladores/PersonaControlador.class.php?Menu=MPeA" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" > <br /><br />

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido"> <br /><br />

        <label for="telefono">Telefono:</label>
        <input type="number" maxlength="9" name="telefono" id="telefono"> <br /><br />

        <label for="email">Email:</label>
        <input type="email" name="email" id="email"> <br /><br />

        <input type="submit" value="Agregar">&nbsp;
        <input type="button" onclick="history.back()" value="Volver">
    </form>

</body>
</html>