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
    
    altaPersona($id, $nombre, $apellido, $telefono, $email);

    
    function altaPersona($id, $nombre, $apellido, $telefono, $email){
        if($id === "")
            $sql = "INSERT INTO persona (nombre,apellido,telefono,email)
            VALUES ('$nombre','$apellido',$telefono,'$email')";
        else
            $sql = "INSERT INTO persona VALUES($id,'$nombre','$apellido',$telefono,'$email')";
        llamarConexion($sql);
    }

    
    function llamarConexion($sql){
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        if ($conexion -> query($sql) === TRUE) header("Location: ./vistaPersonas.php?agregado=true");
        else header("Location: ./vistaPersonas.php?agregado=false");
    }