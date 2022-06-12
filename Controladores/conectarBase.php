<?php  
    function conectar()
    {
        try {
            require_once ('/home/abonilla-trabajo/Documentos/UTU/Programacion/GIT/Primer-Parcial/config.php');
            $con = new mysqli($config['DB_HOST'], $config['DB_USER'], $config['DB_PASS'], $config['DB_NAME']);
            
            mysqli_set_charset($con, "utf8");
            
            //echo "¡Conexión Exitosa!";

            return $con;
        } catch (mysqli_sql_exception $e) {
            echo "¡Error!: " . $e->getMessage();
            die();
        }
        
    }

    function desconectar($con)
    {
        mysqli_close($con);
    }
    $con=conectar();
?>