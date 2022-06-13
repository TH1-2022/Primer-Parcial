<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Lista de Compras</h1>
 

<?php foreach(($listadocompras=CompraControlador::Lista()) as $persona => $fila) :?>

    <b>PERSONA:</b> <?php echo $persona; ?><br>
    <b>ARTICULOS:</b><br>
        <?php foreach($fila as $f) :?>

          <?= $f['NombreProducto']  ?> 
          <?= $f['DescProducto']  ?>
          <br>
        <?php endforeach; ?>
<br>

    <?php endforeach; ?>

    <a href="index.php?controlador=Compra&metodo=FormularioCompra">NUEVA COMPRA</a>

    
</body>
</html>