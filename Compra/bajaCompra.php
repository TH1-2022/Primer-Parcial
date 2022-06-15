<?php 

    $id_persona = $_POST['id_persona'];
    $id_producto = $_POST['id_producto'];

    $conexion = new mysqli("127.0.0.1","root","Pablo51965944","tiendita");
    $sql = "DELETE FROM compra WHERE id_persona = id_persona AND id_producto =  id_producto";
    if($conexion -> query($sql) === TRUE )
        header("Location: ingresarCompra.php?eliminado=true");
    else 
        header("Location: ingresarCompra.php?eliminado=false");

