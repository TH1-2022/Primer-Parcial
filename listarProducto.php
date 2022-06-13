<?php
    require_once "config.php";
    require_once "conexion.php";
    
    function listarProducto($id_producto){
        if($id_producto ==! "")
            $sql = "SELECT * FROM producto WHERE id = $id_producto;";
            return ejcutarSentenciaDevuelveResultado($sql,1)[0];
    }