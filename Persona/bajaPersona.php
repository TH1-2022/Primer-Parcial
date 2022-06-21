<?php 

    $conexion = new mysqli("127.0.0.1","root","Pablo51965944","tiendita");
    $sql = "DELETE FROM persona WHERE id = " . $_GET['id'];
    if($conexion -> query($sql) === TRUE )
        header("Location: ingresarPersona.php?eliminado=true");
    else 
        header("Location: ingresarPersona.php?eliminado=false");

