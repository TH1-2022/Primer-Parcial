<?php 
    require "utils/autoload.php";

    //PersonaControlador::Alta('Juan','Perez',"1234","coso@coso.com");
    
    header("Content-Type:application/json");
    echo json_encode(PersonaControlador::Listar());


