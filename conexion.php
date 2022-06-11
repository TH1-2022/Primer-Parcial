<?php
    function llamarConexion($sql, $ruta, $metodo){
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        if ($conexion -> query($sql)) header("Location: ./vista" . $ruta . ".php?" . $metodo . "=true");
        else header("Location: ./vista" . $ruta . ".php?" . $metodo . "=false");
    }

    function ejcutarSentenciaDevuelveResultado($sql) {
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        $resultado = $conexion-> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
        return $resultado;
    }