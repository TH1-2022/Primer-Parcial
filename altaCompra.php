<?php
    require_once "config.php";

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }

    
    $id = $_POST['id'];
    $email = $_POST['email'];
    $fecha_hora = $_POST['fecha_hora'];
    
    altaCompra($id, $email, $fecha_hora);

    
    function altaCompra($id_persona, $id_producto, $fecha_hora){
        if($id_persona ==! "" AND $id_producto ==! "")
            $sql = "INSERT INTO compra VALUES ($id_persona, $id_producto, $fecha_hora)
                UPDATE producto SET stock = /*<INSERTAR STOCK + 1>*/ WHERE id = $id_producto;";
        llamarConexion($sql);
    }

    
    function llamarConexion($sql){
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        if ($conexion -> query($sql) === TRUE) header("Location: ./vistaPersonas.php?agregado=true");
        else header("Location: ./vistaPersonas.php?agregado=false");
    }