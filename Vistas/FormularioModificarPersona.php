<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    



<form action="/Parcial/index.php?controlador=Persona&metodo=Modificar" method="post">
        
        
         <input type="hidden" name="id" value="<?= $p->Id ?>"> 
        Nombre: <input type="text" name="nombre"  value="<?= $p->nombre ?>"> <br />
        Apellido: <input type="text" name="apellido" value="<?= $p->apellido ?>"> <br />
        Telefono: <input type="number" name="telefono" value="<?= $p->telefono ?>"> <br />
        Email: <input type="text" name="email" value="<?= $p->email ?>"> <br />

        <input type="submit" value="Enviar">
    </form>





</body>
</html>