<?php
    require_once "config.php";
    require_once "conexion.php";

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }


    $id = $_POST['id'];
    
    function listarProducto($id_producto){
        if($id_producto ==! "")
            $sql = "SELECT * FROM producto WHERE id = $id_producto;";
            return ejcutarSentenciaDevuelveResultado($sql,1);
    }