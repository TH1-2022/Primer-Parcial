<?php
    require_once "config.php";

    if($_SERVER['REQUEST_METHOD'] !== "GET"){
        header('Location: 404.php');
        echo "404 Not found";    
    }
    
    $id = $_GET['id'];

    eliminarPersona($id);

    function eliminarPersona($id){
        if($id ==! "")
            $sql = "DELETE FROM persona WHERE id = $id";
        llamarConexion($sql);
    }

    function llamarConexion($sql){
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        if ($conexion -> query($sql) === TRUE) header("Location: ./vistaPersonas.php?eliminado=true");
        else header("Location: ./vistaPersonas.php?eliminado=false");
    }