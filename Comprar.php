<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Agregar Pedido</h1>
    <p> Selecciona el ciente y el que Articulo quieres comprar </p>
    <form action="Control/InsertarCompra.php" method="post">
    <label>Cliente: </label><br>
    <input type="radio" name="persona" value= 1 checked><label>Pepe Perez</label><br>
    <input type="radio" name="persona" value= 2 ><label>Martin Rodriguez</label><br>
    <input type="radio" name="persona" value= 3 ><label>Sol Gonzales</label><br>
    
    <label>Articulo: </label><br>
    
    <input type="radio" name="compra" value=1 checked><label>Moto</label><br>
    <input type="radio" name="compra" value=2><label>Auto</label><br>
    <input type="radio" name="compra" value=3><label>Caballo</label><br>
    <input type="radio" name="compra" value=4><label>Bicicleta</label><br><br>
    <input type="submit" value="Comprar">
    </form>
</body>

</html>