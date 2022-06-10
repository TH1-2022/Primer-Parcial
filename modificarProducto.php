<?php
    require_once "config.php";
    require_once "conexion.php";

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }

    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    
    modificarProducto($id, $nombre, $descripcion, $stock);

    
    function modificarProducto($id, $nombre, $descripcion, $stock){
        if($id ==! "")
            $sql = "UPDATE producto SET
                nombre = '$nombre',
                descripcion = '$descripcion',
                stock = $stock
                WHERE id = $id";
        llamarConexion($sql, "Productos", MODIFICACION);
    }