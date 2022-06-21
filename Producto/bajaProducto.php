<?php 

    $conexion = new mysqli("127.0.0.1","root","Pablo51965944","tiendita");
    $sql = "DELETE FROM producto WHERE id = " . $_GET['id'];
    if($conexion -> query($sql) === TRUE )
        header("Location: ingresarProducto.php?eliminado=true");
    else 
        header("Location: ingresarProducto.php?eliminado=false");

