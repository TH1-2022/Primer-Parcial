<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    



<form action="/Parcial/index.php?controlador=Producto&metodo=Modificar" method="post">
        
        
         <input type="hidden" name="id" value="<?= $p->Id ?>"> 
        Nombre: <input type="text" name="nombre"  value="<?= $p->nombre ?>"> <br />
        Descripcion: <input type="text" name="descripcion" value="<?= $p->descripcion ?>"> <br />
        Stock: <input type="number" name="stock" value="<?= $p->stock ?>"> <br />

        <input type="submit" value="Enviar">
    </form>





</body>
</html>