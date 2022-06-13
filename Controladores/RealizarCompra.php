<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php'); 
    require_once($config['APP_Controller'] . '/conectarBase.php');
    
    if (! $_POST['idP'] or ! $_POST['idC']) {
        header ('Location: ' . $config['Vistas'] . '/404.php');
    }

    $Location = "Location: " . $config['Vistas'] . "/Comprar.php";
    if (! $_POST['stock'] or $_POST['stock'] < 1){
        header($Location . '?exito=nocompra');
    } else {
        $id_persona=$_POST['idP'];
        $id_producto=$_POST['idC'];
        $stock=$_POST['stock']-1;
        
        $sql = "INSERT INTO compra (id_persona, id_producto, fecha_hora) VALUES ($id_persona, $id_producto, NOW())";
        
        if($con -> query($sql) === TRUE ){
            $sql = "UPDATE producto SET stock=$stock WHERE id=$id_producto";
        } else header($Location . '?exito=nocompra');
        
        if($con -> query($sql) === TRUE ) header($Location . '?exito=compra');
        else header($Location . '?exito=nocompra');
    }