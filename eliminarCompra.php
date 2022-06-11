<?php
    require_once "config.php";
    require_once "conexion.php";
    require_once "listarProducto.php";

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
            $producto = listarProducto($id_producto);
            $cambiarStock = $producto['stock'] + 1;
            $sql = "DELETE FROM compra WHERE id_persona = $id_persona AND id_producto = $id_producto AND fecha_hora = '$fecha';";
            $resultadoEliminar = ejcutarSentenciaDevuelveResultado($sql,"0");
            $sql = "UPDATE producto SET stock = $cambiarStock WHERE id = $id_producto;";
            $resultadoModificar = ejcutarSentenciaDevuelveResultado($sql,"0");
            if($resultadoEliminar && $resultadoModificar) return irVista(TRUE, "ListarCompras", BAJA, $id_persona);
        }
        return irVista(FALSE, "ListarCompras", BAJA, null);
    }