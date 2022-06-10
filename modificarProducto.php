<?php
    require_once "config.php";

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
        llamarConexion($sql);
    }

    
    function llamarConexion($sql){
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        if ($conexion -> query($sql) === TRUE) header("Location: ./vistaProductos.php?modificado=true");
        else header("Location: ./vistaProductos.php?modificado=false");
    }