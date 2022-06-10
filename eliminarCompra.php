<?php
    require_once "config.php";

    if($_SERVER['REQUEST_METHOD'] !== "GET"){
        header('Location: 404.php');
        echo "404 Not found";    
    }
    
    $id = $_GET['id'];

    eliminarPersona($id);

    function eliminarPersona($id_persona, $id_producto){
        if($id_persona ==! "" and $id_producto)
            $sql = "DELETE FROM compra WHERE id_persona = $id_persona AND id_producto = $id_producto;
                    UPDATE producto SET stock = /*<INSERTAR STOCK + 1>*/ WHERE id = $id_producto;";
        llamarConexion($sql);
    }

    function llamarConexion($sql){
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        if ($conexion -> query($sql) === TRUE) header("Location: ./vistaPersonas.php?eliminado=true");
        else header("Location: ./vistaPersonas.php?eliminado=false");
    }