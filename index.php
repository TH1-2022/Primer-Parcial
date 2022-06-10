<?php 
    require "utils/autoload.php";

    //CompraControlador::Alta("3", "2");
    
    header("Content-Type:application/json");
    echo json_encode(CompraControlador::Listar());



