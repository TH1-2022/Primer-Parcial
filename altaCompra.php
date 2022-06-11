<?php
    require_once "config.php";
    require_once "conexion.php";
    require_once "listarProducto.php";
    require_once "listarPersona.php";

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }

    
    $id_producto = $_POST['id'];
    $email = $_POST['email'];
    $fecha_hora = $_POST['fecha_hora'];
    
    altaCompra($email, $id_producto, $fecha_hora);

    function altaCompra($email, $id_producto, $fecha_hora){
        if($email ==! "" AND $id_producto ==! "")
            $producto = listarProducto($id_producto);
            $persona = listarPersona($email);
            $id_persona = $persona['id'];
            $agregarCompra = $producto['stock'] - 1;
            $sql = "INSERT INTO compra VALUES ($id_persona, $id_producto, '$fecha_hora');
                UPDATE producto SET stock = $agregarCompra WHERE id = $id_producto;";
        llamarConexion($sql, "Compras", ALTA);
    }