<?php
    require_once "config.php";
    require_once "conexion.php";
    require_once "listarProducto.php";
    require_once "listarPersona.php";
    require_once "modificarStock.php";

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }

    
    $id_producto = $_POST['id'];
    $email = $_POST['email'];
    $fecha_hora = $_POST['fecha_hora'];
    
    altaCompra($email, $id_producto, $fecha_hora);

    function altaCompra($email, $id_producto, $fecha_hora){
        if($email ==! "" AND $id_producto ==! ""){
            $id_persona = obtenerId($email);
            $stock = modificarStock($id_producto, ALTA);
            $resultadoModificar = ejecutarModificacion($id_producto, $stock);
            $resultadoInsertar = ejecutarInsertar($id_persona, $id_producto, $fecha_hora, $stock);
        }
        decidirVista($resultadoInsertar, $resultadoModificar, $id_persona);
    }

    function validarStock($stock){
        if ($stock >= 0) return TRUE;
        return FALSE;
    }

    function ejecutarModificacion($id_producto, $stock){
        if (validarStock($stock)){
            $sql = "UPDATE producto SET stock = $stock WHERE id = $id_producto;";
            return ejcutarSentenciaDevuelveResultado($sql,"0");
        }
    }

    function ejecutarInsertar($id_persona, $id_producto, $fecha_hora, $stock){
        if (validarStock($stock)){
            $sql = "INSERT INTO compra VALUES ($id_persona, $id_producto, '$fecha_hora');";
            return ejcutarSentenciaDevuelveResultado($sql,"0");
        }
    }

    function decidirVista($resultadoInsertar, $resultadoModificar, $id_persona){
        if($resultadoInsertar && $resultadoModificar) return irVista(TRUE, "ListarCompras", ALTA, $id_persona);
        return irVista(FALSE, "ListarCompras", ALTA, $id_persona);
    }