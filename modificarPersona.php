<?php
    require_once "config.php";

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }

    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    
    modificarPersona($id, $nombre, $apellido, $telefono, $email);

    
    function modificarPersona($id, $nombre, $apellido, $telefono, $email){
        if($id ==! "")
            $sql = "UPDATE persona SET
                nombre = '$nombre'
                apellido = '$apellido'
                telefono = $telefono
                email = '$email'
                WHERE id = $id";
        llamarConexion($sql);
    }

    
    function llamarConexion($sql){
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        if ($conexion -> query($sql) === TRUE) header("Location: ./vistaPersonas.php?modificado=true");
        else header("Location: ./vistaPersonas.php?modificado=false");
    }