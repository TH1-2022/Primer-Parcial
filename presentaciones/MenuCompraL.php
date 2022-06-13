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
    <h1>MENU DE COMPRA</h1>

    <h2>En esta pagina se pueden ver las compras realizadas.</h2>
    <br />

    <?php foreach(CompraControlador::Listar() as $fila) :
        $persona = PersonaControlador::Mostrar($fila['id_persona']);?>
            
            <b>Id(persona):</b> <?=$persona['id']?>  
            <b>&nbsp;&nbsp;Nombre:</b>  <?=$persona['nombre']?> 
            <b>&nbsp;&nbsp;Apellido:</b> <?=$persona['apellido']?> 
            <b>&nbsp;&nbsp;Telefono:</b> <?=$persona['telefono']?> 
            <b>&nbsp;&nbsp;Email:</b>  <?=$persona['email']?> 
            <br />
            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Id(producto):</b>  <?=$fila['id_producto']?> 
            <b>&nbsp;&nbsp;Nombre:</b>  <?=$fila['nombre']?> 
            <b>&nbsp;&nbsp;Descripcion:</b> <?=$fila['descripcion']?> 
            <b>&nbsp;&nbsp;Fecha y hora:</b> <?=$fila['fecha_hora']?> 
            <br /><br />
    
    <?php endforeach; ?><br />

    <br />
    Para regresar al menu presione <a href="/index.php">Volver</a>

</body>
</html>