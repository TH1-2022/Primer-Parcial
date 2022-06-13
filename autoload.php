<?php 

    spl_autoload_register(function ($clase){        
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/Primer-Parcial/Modelos/$clase.class.php"))
            require $_SERVER['DOCUMENT_ROOT'] . "/Primer-Parcial/Modelos/$clase.class.php";    

            

    
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/Primer-Parcial/Controladores/$clase.class.php"))
            require $_SERVER['DOCUMENT_ROOT'] . "/Primer-Parcial/Controladores/$clase.class.php";

            
        
    });