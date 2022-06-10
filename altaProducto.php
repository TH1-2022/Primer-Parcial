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

    altaProducto($id, $nombre, $descripcion, $stock);

    
    function altaProducto($id, $nombre, $descripcion, $stock){
        if($id === "")
            $sql = "INSERT INTO producto (nombre,descripcion,stock)
            VALUES ('$nombre','$descripcion',$stock)";
        else
            $sql = "INSERT INTO producto VALUES($id,'$nombre','$descripcion',$stock)";
        llamarConexion($sql);
    }

    
    function llamarConexion($sql){
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        if ($conexion -> query($sql) === TRUE) header("Location: ./vistaProductos.php?agregado=true");
        else header("Location: ./vistaProductos.php?agregado=false");
    }