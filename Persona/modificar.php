<?php 

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];


    $conexion = new mysqli("127.0.0.1","root","Pablo51965944","tiendita");

    $sql = "UPDATE persona SET 
        nombre = '$nombre',
        apellido = '$apellido',
        telefono = $telefono,
        email = '$email'
        WHERE id = $id";

    if($conexion -> query($sql) === TRUE )
        header("Location: ingresarPersona.php?modificado=true");
    else 
        header("Location: ingresarPersona.php?modificado=false");

