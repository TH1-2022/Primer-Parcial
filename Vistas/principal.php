<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 

<h1>Pagina Principal</h1>
<br>


<h2>Listado de Productos</h2>
<br>
<section>

 <?php  foreach(($listadoproductos = ProductoControlador::Listar()) as $fila) :?>
            
            <b>ID:</b> <?=$fila['id']?>  
            <b>Nombre:</b>  <?=$fila['nombre']?> 
            <b>Descripcion:</b> <?=$fila['descripcion']?>
            <b>Stock:</b> <?=$fila['stock']?>
        
            <a href="index.php?controlador=Producto&metodo=Baja&id=<?=$fila['id']?>">Eliminar</a>
            <a href="index.php?controlador=Producto&metodo=FormularioModificar&id=<?=$fila['id']?>">Modificar</a>
    
            <br />
    
        <?php endforeach; ?>

        <div>
            <br>
            <a href="index.php?controlador=Producto&metodo=FormularioAlta">AGREGAR PRODUCTO</a>
            
        </div>

</section>
    
<br><br>    

<h2>Listado de Personas</h2>
<br>
<section>
        <?php foreach(($listadopersonas = PersonaControlador::Listar()) as $fila) :?>
            
            <b>ID:</b> <?=$fila['id']?>  
            <b>Nombre:</b>  <?=$fila['nombre']?> 
            <b>Apellido:</b> <?=$fila['apellido']?>
            <b>Telefono:</b>  <?=$fila['telefono']?>
            <b>Email:</b>  <?=$fila['email']?>
        
            <a href="index.php?controlador=Persona&metodo=Baja&id=<?=$fila['id']?>">Eliminar</a>
            <a href="index.php?controlador=Persona&metodo=FormularioModificar&id=<?=$fila['id']?>">Modificar</a>
    
            <br />
    
        <?php endforeach; ?>


        <div>
            <br>
                       <a href="index.php?controlador=Persona&metodo=FormularioAlta">AGREGAR PERSONA</a>
        </div>

</section>

<br><br><br><br><br><br>    
<a href="index.php?controlador=Compra&metodo=FormularioCompra">LISTAR COMPRAS</a>

</body>
</html>