<?php
    function llamarConexion($sql, $ruta, $metodo){
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        if ($conexion -> query($sql) === TRUE) header("Location: ./vista" . $ruta . ".php?" . $metodo . "=true");
        else header("Location: ./vista" . $ruta . ".php?" . $metodo . "=false");
    }