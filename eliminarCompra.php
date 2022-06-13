<?php
    require_once "config.php";
    require_once "conexion.php";
    require_once "listarProducto.php";
    require_once "modificarStock.php";

    if($_SERVER['REQUEST_METHOD'] !== "GET"){
        header('Location: 404.php');
        echo "404 Not found";    
    }
        
    $id_persona = $_GET['persona'];
    $id_producto = $_GET['producto'];
    $fecha = $_GET['fecha'];

    eliminarCompra($id_persona, $id_producto, $fecha);

    function eliminarCompra($id_persona, $id_producto, $fecha){
        if($id_persona ==! "" AND $id_producto ==! ""){
            $stock = modificarStock($id_producto, BAJA);
            $resultadoEliminar = ejecutarEliminacion($id_persona, $id_producto, $fecha, $stock);
            $resultadoModificar = ejecutarModificacion($id_producto, $stock);
        }
        decidirVista($resultadoEliminar, $resultadoModificar, $id_persona);
    }


    function ejecutarEliminacion($id_persona, $id_producto, $fecha_hora, $stock){
        $sql = "DELETE FROM compra WHERE id_persona = $id_persona AND id_producto = $id_producto AND fecha_hora = '$fecha_hora';";
        return $resultadoEliminar = ejcutarSentenciaDevuelveResultado($sql,"0");
    }


    function ejecutarModificacion($id_producto, $stock){
        $sql = "UPDATE producto SET stock = $stock WHERE id = $id_producto;";
        return ejcutarSentenciaDevuelveResultado($sql,"0");
    }

    
    function decidirVista($resultadoEliminar, $resultadoModificar, $id_persona){
        if($resultadoEliminar && $resultadoModificar) return irVista(TRUE, "ListarCompras", BAJA, $id_persona);
        return irVista(FALSE, "ListarCompras", BAJA, $id_persona);
    }