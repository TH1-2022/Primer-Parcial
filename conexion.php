<?php
    function llamarConexion($sql, $ruta, $metodo){
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        $resultado = $conexion -> query($sql);
        if ($resultado === "true") header("Location: ./vista" . $ruta . ".php?" . $metodo . "=true");
        else header("Location: ./vista" . $ruta . ".php?" . $metodo . "=false");
    }

    function ejcutarSentenciaDevuelveResultado($sql, $buscar) {
        $conexion = new Mysqli(IP_DB,USER_DB,PASS_DB,NAME_DB);
        $resultado = $conexion-> query($sql);
        if ($buscar == 1) return $resultado -> fetch_all(MYSQLI_ASSOC)[0];
        return $resultado;
    }