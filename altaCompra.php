<?php
    require_once "config.php";
    require_once "conexion.php";
    require_once "listarProducto.php";
    require_once "listarPersona.php";

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }

    
    $id_producto = $_POST['id'];
    $email = $_POST['email'];
    $fecha_hora = $_POST['fecha_hora'];
    
    altaCompra($email, $id_producto, $fecha_hora);

    function altaCompra($email, $id_producto, $fecha_hora){
        if($email ==! "" AND $id_producto ==! "")
            $producto = listarProducto($id_producto);
            $persona = listarPersona($email);
            $id_persona = $persona['id'];
            $agregarCompra = $producto['stock'] - 1;
            $sql = "UPDATE producto SET stock = $agregarCompra WHERE id = $id_producto;";
            $resultadoModificar = ejcutarSentenciaDevuelveResultado($sql,"0");
            $sql = "INSERT INTO compra VALUES ($id_persona, $id_producto, '$fecha_hora');";
            $resultadoInsertar = ejcutarSentenciaDevuelveResultado($sql,"0");
            if($resultadoInsertar && $resultadoModificar) return irVista(TRUE, "ListarCompras", ALTA, $id_persona);
        return irVista(FALSE, "ListarCompras", ALTA, null);
    }

    function irVista($resultado, $ruta, $metodo, $id_persona){
        if ($resultado) header("Location: ./vista" . $ruta . ".php?id=$id_persona&" . $metodo . "=true");
        else header("Location: ./vista" . $ruta . ".php?" . $metodo . "=false");
    }