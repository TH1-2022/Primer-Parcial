<?php
    require_once "config.php";
    require_once "conexion.php";

    function modificarStock($id, $operacion){
        $producto = listarProducto($id);
        if ($operacion === ALTA) $cambiarStock = $producto['stock'] - 1;
        if ($operacion === BAJA) $cambiarStock = $producto['stock'] + 1;
        return $cambiarStock;
    }