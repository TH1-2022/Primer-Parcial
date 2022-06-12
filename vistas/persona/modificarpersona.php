<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        $telefono = $_GET['telefono'];
        $email = $_GET['email'];
    ?>

    <form action="modificarpersonaingresar.php" method="post">
        ID <input type="text" name="id" value="<?= $id ?>"readonly><br />
        Nombre <input type="text" name="nombre" value="<?= $nombre ?>"><br />
        Apellido <input type="text" name="apellido" value="<?= $apellido ?>"><br />
        Telefono <input type="number" name="telefono" value="<?= $telefono ?>"><br />
        Email <input type="email" name="email" value="<?= $email ?>"><br />
        <input type="submit" value="Modificar"></button>
    </form></br>

    <a href="listarpersona.php">Volver</a></br></br>
    
</body>
</html>