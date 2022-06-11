<?php
    require_once "config.php";
    require_once "conexion.php";

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }

    $email = $_POST['email'];
    
    function listarPersona($email){
        if($email ==! "")
            $sql = "SELECT * FROM persona WHERE email = '$email';";
            return ejcutarSentenciaDevuelveResultado($sql,1);
    }