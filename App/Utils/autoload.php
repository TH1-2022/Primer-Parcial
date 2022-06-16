
<?php 
    spl_autoload_register(function ($class){
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/Models/$class.class.php"))
            require $_SERVER['DOCUMENT_ROOT'] . "/Models/$class.class.php";
    
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/Controllers/$class.class.php"))
            require $_SERVER['DOCUMENT_ROOT'] . "/Controllers/$class.class.php";
        
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/Views/$class.View.php"))
            require $_SERVER['DOCUMENT_ROOT'] . "/Views/$class.View.php";
    });

    require_once "config.php";