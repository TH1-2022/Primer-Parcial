<?php
    require_once "config.php";
    require_once "conexion.php";

    function listarPersona($email){
        if($email ==! "")
            $sql = "SELECT * FROM persona WHERE email = '$email';";
            return ejcutarSentenciaDevuelveResultado($sql,1)[0];
    }

    function ObtenerID($email){
        $persona = listarPersona($email);
        return $persona['id'];
    }