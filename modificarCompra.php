<?php
    require_once "config.php";
    require_once "conexion.php";
    require_once "listarPersona.php";
    
    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }

    
    $id = $_POST['id'];
    $email = $_POST['email'];
    $fechaActualizada = $_POST['fechaAc'];
    $fechaAntigua = $_POST['fechaAn'];
    
    modificarCompra($id, $email, $fechaActualizada, $fechaAntigua);

    
    function modificarCompra($id, $email, $fechaActualizada, $fechaAntigua){
        if($id ==! "" AND $email ==! "" AND $fechaActualizada ==! "" AND $fechaAntigua ==! ""){
            $persona = listarPersona($email);
            $id_persona = $persona['id'];
            $sql = "UPDATE compra SET
                fecha_hora = '$fechaActualizada'
                WHERE id_producto = $id AND id_persona = $id_persona AND fecha_hora = '$fechaAntigua';";
        }
        return llamarConexion($sql, "ListarCompras", MODIFICACION);
    }