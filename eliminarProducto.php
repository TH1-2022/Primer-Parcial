<?php
    require_once "config.php";
    require_once "conexion.php";

    if($_SERVER['REQUEST_METHOD'] !== "GET"){
        header('Location: 404.php');
        echo "404 Not found";    
    }
    
    $id = $_GET['id'];

    eliminarProducto($id);

    function eliminarProducto($id){
        if($id ==! "")
            $sql = "DELETE FROM producto WHERE id = $id";
        return llamarConexion($sql, "Productos", BAJA);
    }