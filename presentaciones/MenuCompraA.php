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

    <h2>En esta pagina se puede realizar la compra de un producto.<br />
        Para continuar seleccione el producto a comprar y quien realiza la compra.
    </h2><br />

    <form action="/presentaciones/MenuCompraA.php" method="get">
        <label for="idPersona">Seleccione el id del comprador:</label>&nbsp;
        <select name="idPersona" id="idPersona">
        <?php foreach(PersonaControlador::Listar() as $fila) :?>
            <option value="<?=$fila['id']?>"><?=$fila['id']?></option>
        <?php endforeach; ?>  
        </select>
        <br /><br />

        <label for="idProducto">Seleccione el id del producto:</label>&nbsp;
        <select name="idProducto" id="idProducto">
            <?php foreach(ProductoControlador::Listar() as $fila) :?>
                <option value="<?=$fila['id']?>"><?=$fila['id']?></option>
            <?php endforeach; ?>
        </select>

        <br /><br />
        <input type="submit" value="Mostrar datos">&nbsp;
    </form>

    <br /><br />

    <?php if(isset($_GET['idPersona']) && isset($_GET['idProducto'])):
        $persona = PersonaControlador::Mostrar($_GET["idPersona"]);
        $producto = ProductoControlador::Mostrar($_GET["idProducto"])?>
        
        <form action="/controladores/CompraControlador.class.php?Menu=MCA" method="post">
            <label for="idPersona">Id:</label>
            <input type="number" name="idPersona" id="idPersona" value="<?=$persona['id']?>" readonly> &nbsp;&nbsp;    

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?=$persona['nombre']?>" readonly> &nbsp;&nbsp;

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="<?=$persona['apellido']?>" readonly> &nbsp;&nbsp;

            <label for="telefono">Telefono:</label>
            <input type="number" maxlength="9" name="telefono" id="telefono" value="<?=$persona['telefono']?>" readonly> &nbsp;&nbsp;

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?=$persona['email']?>" readonly> &nbsp;&nbsp;

            <br /><br />
            
            <label for="idProducto">Id:</label>
            <input type="number" name="idProducto" id="idProducto" value="<?=$producto['id']?>" readonly> &nbsp;&nbsp;    

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?=$producto['nombre']?>" readonly> &nbsp;&nbsp;

            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" id="descripcion" value="<?=$producto['descripcion']?>" readonly> &nbsp;&nbsp;

            <label for="stock">Stock:</label>
            <input type="number" maxlength="9" name="stock" id="stock" value="<?=$producto['stock']?>" readonly> &nbsp;&nbsp;

            <br /><br />
            <label for="Comprar">¿Desea realizar la compra del producto?</label>
            <input type="submit" value="Comprar">&nbsp;
        </form>
        <br /><br />
    <?php endif;?>
    
    Para regresar al menu presione <a href="/index.php">Volver</a>

</body>
</html>