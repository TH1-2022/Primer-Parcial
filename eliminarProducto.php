<?php
    require_once "config.php";

    if($_SERVER['REQUEST_METHOD'] !== "GET"){
        header('Location: 404.php');
        echo "404 Not found";    
    }
    
    $id = $_GET['id'];

    eliminarProducto($id);

    function eliminarProducto($id){
        if($id ==! "")
            $sql = "DELETE FROM producto WHERE id = $id";
        llamarConexion($sql);
    }

    function llamarConexion($sql){
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        if ($conexion -> query($sql) === TRUE) header("Location: ./vistaProductos.php?eliminado=true");
        else header("Location: ./vistaProductos.php?eliminado=false");
    }