<?php
    require_once "config.php";
    require_once "conexion.php";

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
        else $sql = "INSERT INTO persona VALUES($id,'$nombre','$apellido',$telefono,'$email')";
        $resultadoInsertar = ejcutarSentenciaDevuelveResultado($sql,"0");
        
        return irVista($resultadoInsertar, "Personas", ALTA, $id);
    }