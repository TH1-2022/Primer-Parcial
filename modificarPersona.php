<?php
    require_once "config.php";
    require_once "conexion.php";
    require_once "listarPersona.php";
    require_once "listarCompra.php";
    
    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }

    
    $id = $_POST['id'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    
    modificarPersona($id, $email, $fecha);

    
    function modificarPersona($id, $email, $fechaActualizada){
        if($id ==! "" AND $email ==! "" AND $fecha ==! "")
            $sql = "UPDATE compra SET
                fecha_hora = '$fecha'
                WHERE id_producto = $id AND id_persona = $id_persona AND fecha_hora = $fecha_Antigua";
        llamarConexion($sql, "Productos", MODIFICACION);
    }