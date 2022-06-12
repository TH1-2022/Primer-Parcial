<?php
    require_once "config.php";
    require_once "conexion.php";

    if($_SERVER['REQUEST_METHOD'] !== "GET"){
        header('Location: 404.php');
        echo "404 Not found";    
    }
    
    $id = $_GET['id'];

    eliminarPersona($id);

    function eliminarPersona($id){
        if($id ==! "")
            $sql = "DELETE FROM persona WHERE id = $id";
        return llamarConexion($sql, "Personas", BAJA);
    }