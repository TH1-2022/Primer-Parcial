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
    <h1>MENU DE PRODUCTO</h1>

    <h2>
        En esta pagina se puede eliminar o modificar un producto.<br />
        Consulte el codigo para saber a que realizar la accion.<br />
    </h2>
    <br />

    <?php if (isset($_GET['IdE'])) :
        ProductoControlador::Eliminar($_GET["IdE"]);
        CompraControlador::EliminarProducto($_GET["IdE"]);
        endif;?>

    <?php foreach(ProductoControlador::Listar() as $fila) :?>
            
            <b>ID:</b> <?=$fila['id']?>  
            <b>&nbsp;&nbsp;Nombre:</b>  <?=$fila['nombre']?> 
            <b>&nbsp;&nbsp;Descripcion:</b> <?=$fila['descripcion']?> 
            <b>&nbsp;&nbsp;Stock:</b> <?=$fila['stock']?> 
            <a href="/presentaciones/MenuProductoEML.php?IdE=<?=$fila['id']?>">&nbsp;Eliminar</a>
            <a href="/presentaciones/MenuProductoEML.php?IdM=<?=$fila['id']?>">&nbsp;Modificar</a>
            <br />
    
    <?php endforeach; ?><br />

    <?php if(isset($_GET['IdM'])):
        $producto = ProductoControlador::Mostrar($_GET["IdM"])?>
        
        <form action="/controladores/ProductoControlador.class.php?Menu=MPrM" method="post">
            <label for="id">Id:</label>
            <input type="number" name="id" id="id" value="<?=$producto['id']?>" readonly> <br /><br />    

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?=$producto['nombre']?>" > <br /><br />

            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion" value="<?=$producto['descripcion']?>"> <br /><br />

            <label for="stock">Stock:</label>
            <input type="number" maxlength="9" name="stock" id="stock" value="<?=$producto['stock']?>"> <br /><br />

            <input type="submit" value="Modificar">&nbsp;
        </form>
    <?php endif;?>
    <br />
    Para regresar al menu presione <a href="/index.php">Volver</a>

</body>
</html>