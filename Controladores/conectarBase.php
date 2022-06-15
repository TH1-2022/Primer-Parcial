<?php   
    try {
        require_once ('../config.php');
        $con = new mysqli($config['DB_HOST'], $config['DB_USER'], $config['DB_PASS'], $config['DB_NAME']);
        
        mysqli_set_charset($con, "utf8");
        
    } catch (mysqli_sql_exception $e) {
        echo "¡Error!: " . $e->getMessage();
        die();
    }
?>
