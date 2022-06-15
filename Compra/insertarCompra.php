<?php 

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }
    
    $id_persona = $_POST['id_persona'];
    $id_producto = $_POST['id_producto'];
    $fecha_hora = $_POST['fecha_hora'];
    


    $conexion = new mysqli("127.0.0.1","root","Pablo51965944","tiendita");

        $sql = "INSERT INTO compra VALUES($id_persona,$id_producto,'$fecha_hora')";

    if($conexion -> query($sql) === TRUE )
        header("Location: ingresarCompra.php?exito=true");
    else 
        header("Location: ingresarCompra.php?exito=false");

?>