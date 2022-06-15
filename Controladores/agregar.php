<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php'); 
    require_once($config['APP_Controller'] . '/conectarBase.php');
    $Location = "Location: " . $config['Vistas'] . "/Listar.php?Listar=" . $_GET['Listar'];
    if ($_SERVER['REQUEST_METHOD'] !== "POST" or ! $_GET['Listar']) {
        header('Location: /Vistas/404.php');
    }
    
    if ($_GET['Listar'] == "Personas") {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $email = $_POST['correo'];
        
        if (! empty(trim($nombre)) and ! empty(trim($apellido)) and ! empty(trim($email))) {
            $sql = "INSERT INTO persona (nombre,apellido,telefono,email) VALUES ('$nombre','$apellido',$telefono,'$email')";
        } else { 
            header($Location . '&exito=noagregado');
        }
        
    }

    if ($_GET['Listar'] == "Productos") {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        if (! empty(trim($nombre)) and ! empty(trim($stock) or $stock == 0)) {
            $sql = "INSERT INTO producto (nombre,descripcion,stock) VALUES ('$nombre','$descripcion', '$stock')";
        } else { 
            header($Location . '&exito=noagregado');
        }
        
    }
    
    if ($_GET['Listar'] == "Compras") {
        $idDePersona = $_POST['idDePersona'];
        $idDeProducto = $_POST['idDeProducto'];
        $fechaDeCompra = $_POST['fechaDeCompra'];
        
        if (! empty(trim($idDePersona)) and ! empty(trim($idDeProducto)) and ! empty(trim($fechaDeCompra))) {
            $sql = "INSERT INTO compra (id_persona,id_producto,fecha_hora) VALUES ('$idDePersona','$idDeProducto', DATE_FORMAT('$fechaDeCompra', '%Y-%m-%d %H:%i:%s'))";
        }
        
        if (! empty(trim($idDePersona)) and ! empty(trim($idDeProducto)) and empty(trim($fechaDeCompra))) {
            $sql = "INSERT INTO compra (id_persona,id_producto,fecha_hora) VALUES ('$idDePersona','$idDeProducto', NOW())";
        } 
        if (empty($idDePersona) or empty($idDeProducto)) {
            header($Location . '&exito=noagregado');
        }
        
    }

    if($con -> query($sql) === TRUE ) header($Location . '&exito=agregado');
    else header($Location . '&exito=noagregado');
