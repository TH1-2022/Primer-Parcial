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
        if($id ==! ""){
            $sql = "DELETE FROM persona WHERE id = $id";
            $resultadoEliminar = ejcutarSentenciaDevuelveResultado($sql,"0");
        }
        return irVista($resultadoEliminar, "Personas", BAJA, $id);
    }