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

    <h2>
        En esta pagina se puede eliminar o modificar un cliente.<br />
        Consulte el codigo para saber a quien realizar la accion.<br />
    </h2>
    <br />

    <?php if (isset($_GET['IdE'])):
        PersonaControlador::Eliminar($_GET["IdE"]);
        CompraControlador::EliminarPersona($_GET["IdE"]);
        endif;?>

    <?php foreach(PersonaControlador::Listar() as $fila) :?>
            
            <b>ID:</b> <?=$fila['id']?>  
            <b>&nbsp;&nbsp;Nombre:</b>  <?=$fila['nombre']?> 
            <b>&nbsp;&nbsp;Apellido:</b> <?=$fila['apellido']?> 
            <b>&nbsp;&nbsp;Telefono:</b> <?=$fila['telefono']?> 
            <b>&nbsp;&nbsp;Email:</b>  <?=$fila['email']?> 
            <a href="/presentaciones/MenuPersonaEML.php?IdE=<?=$fila['id']?>">&nbsp;Eliminar</a>
            <a href="/presentaciones/MenuPersonaEML.php?IdM=<?=$fila['id']?>">&nbsp;Modificar</a>
            <br />
    
    <?php endforeach; ?><br />

    <?php if(isset($_GET['IdM'])):
        $persona = PersonaControlador::Mostrar($_GET["IdM"])?>
        
        <form action="/controladores/PersonaControlador.class.php?Menu=MPeM" method="post">
            <label for="id">Id:</label>
            <input type="number" name="id" id="id" value="<?=$persona['id']?>" readonly> <br /><br />    

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?=$persona['nombre']?>" > <br /><br />

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="<?=$persona['apellido']?>"> <br /><br />

            <label for="telefono">Telefono:</label>
            <input type="number" maxlength="9" name="telefono" id="telefono" value="<?=$persona['telefono']?>"> <br /><br />

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?=$persona['email']?>"> <br /><br />

            <input type="submit" value="Modificar">&nbsp;
        </form>
    <?php endif;?>
    <br />
    Para regresar al menu presione <a href="/index.php">Volver</a>

</body>
</html>