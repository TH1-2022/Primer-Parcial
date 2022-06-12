<?php
    function llamarConexion($sql, $ruta, $metodo){
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        $resultado = $conexion -> query($sql);
        if ($resultado) header("Location: ./vista" . $ruta . ".php?" . $metodo . "=true");
        else header("Location: ./vista" . $ruta . ".php?" . $metodo . "=false");
    }

    function ejcutarSentenciaDevuelveResultado($sql, $buscar) {
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        $resultado = $conexion-> query($sql);
        if ($buscar == 1) return $resultado -> fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }

    function irVista($resultado, $ruta, $metodo, $id){
        if ($resultado) header("Location: ./vista" . $ruta . ".php?id=$id&" . $metodo . "=true");
        else header("Location: ./vista" . $ruta . ".php?" . $metodo . "=false");
    }