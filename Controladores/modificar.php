<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php'); 
    require_once($config['APP_Controller'] . '/conectarBase.php');
    $Location = "Location: " . $config['Vistas'] . "/Listar.php?Listar=" . $_GET['Listar'];
    if ($_SERVER['REQUEST_METHOD'] !== "POST" or ! $_GET['Listar']) {
        header('Location: /Vistas/404.php');
    }
    
    if ($_GET['Listar'] == "Personas") {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        
        if (! empty(trim($nombre)) and ! empty(trim($apellido)) and ! empty(trim($email))) {
            $sql = "UPDATE persona SET nombre='$nombre', apellido='$apellido', telefono=$telefono, email='$email' WHERE id=$id";
        } else { 
            header($Location . '&exito=nomodificado');
        }
        
    }

    if ($_GET['Listar'] == "Productos") {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        if (! empty(trim($nombre)) and ! empty(trim($stock))) {
            $sql = "UPDATE producto SET nombre='$nombre', descripcion='$descripcion', stock=$stock WHERE id=$id";
        } else { 
            header($Location . '&exito=nomodificado');
        }
        
    }

    if($con -> query($sql) === TRUE ) header($Location . '&exito=modificado');
    else header($Location . '&exito=nomodificado');