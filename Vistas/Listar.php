<!DOCTYPE html>
<html lang="es">
    
    <?php 
        if (! $_GET['Listar']) {
            header('Location: /Vistas/403.php');
        } 

        if ($_GET['Listar']) {
            $PAGENAME=$_GET['Listar'];
            require_once ($_SERVER['DOCUMENT_ROOT'] . '/Vistas/head.php');
        }
    ?>

<body>

    <?php
        require_once ($config['APP_Vistas'] . '/menu.php');
        if ($_GET['Listar'] == "Personas") $TABLA = "persona";
        if ($_GET['Listar'] == "Productos") $TABLA = "producto";
        if ($_GET['Listar'] == "Compras") $TABLA = "compra";
        $sql = "SELECT * FROM " . $TABLA;
        $resultados = $con -> query($sql) -> fetch_all(MYSQLI_ASSOC); 
        
        if($resultados == NULL) echo "La lista de " . $_GET['Listar'] . " esta vacia";
        
        if ($resultados != NULL and $_GET['Listar'] == "Personas") include_once ($config['APP_Vistas'] . "/ListarPersonas.php");
        if($_GET['Listar'] == "Personas") include_once ($config['APP_Vistas'] . "/AgregarPersonas.php");
        
        if ($resultados != NULL and $_GET['Listar'] == "Productos") include_once ($config['APP_Vistas'] . "/ListarProductos.php"); 
        if($_GET['Listar'] == "Productos") include_once ($config['APP_Vistas'] . "/AgregarProductos.php");

        if ($resultados != NULL and $_GET['Listar'] == "Compras") include_once ($config['APP_Vistas'] . "/ListarCompras.php");
        if($_GET['Listar'] == "Compras") include_once ($config['APP_Vistas'] . "/AgregarCompras.php");
        
        
    ?>
    
</body>
</html>