<!DOCTYPE html>
<html lang="es">
    
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php'); 
        require_once($config['APP_Controller'] . '/conectarBase.php');
        
        if (! $_GET['Listar']) {
            header('Location: ' . $config['Vistas'] . '/403.php');
        } 

        if ($_GET['Listar']) {
            $PAGENAME=$_GET['Listar'];
            require_once ($config['APP_Vistas'] . '/head.php');
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
        if($_GET['Listar'] == "Personas" and $_GET['exito'] == "agregado") echo "Se agrego a la persona";
        if($_GET['Listar'] == "Personas" and $_GET['exito'] == "noagregado") echo "Hubo un error al agregar a la persona";
        if($_GET['Listar'] == "Personas" and $_GET['exito'] == "modificado") echo "Se modificó a la persona";
        if($_GET['Listar'] == "Personas" and $_GET['exito'] == "nomodificado") echo "Hubo un error al modificar a la persona";
        if($_GET['Listar'] == "Personas" and $_GET['exito'] == "eliminado") echo "Se eliminó a la persona";
        if($_GET['Listar'] == "Personas" and $_GET['exito'] == "noeliminado") echo "Hubo un error al eliminar a la persona";
                
        if ($resultados != NULL and $_GET['Listar'] == "Productos") include_once ($config['APP_Vistas'] . "/ListarProductos.php"); 
        if($_GET['Listar'] == "Productos") include_once ($config['APP_Vistas'] . "/AgregarProductos.php");
        if($_GET['Listar'] == "Productos" and $_GET['exito'] == "agregado") echo "Se agrego el producto";
        if($_GET['Listar'] == "Productos" and $_GET['exito'] == "noagregado") echo "Hubo un error al agregar el producto";
        if($_GET['Listar'] == "Productos" and $_GET['exito'] == "modificado") echo "Se modificó el producto";
        if($_GET['Listar'] == "Productos" and $_GET['exito'] == "nomodificado") echo "Hubo un error al modificar el producto";
        if($_GET['Listar'] == "Productos" and $_GET['exito'] == "eliminado") echo "Se eliminó el producto";
        if($_GET['Listar'] == "Productos" and $_GET['exito'] == "noeliminado") echo "Hubo un error al eliminar el producto";

        if ($resultados != NULL and $_GET['Listar'] == "Compras") include_once ($config['APP_Vistas'] . "/ListarCompras.php");
        if($_GET['Listar'] == "Compras") include_once ($config['APP_Vistas'] . "/AgregarCompras.php");
        if($_GET['Listar'] == "Compras" and $_GET['exito'] == "agregado") echo "Se realizó la compra";
        if($_GET['Listar'] == "Compras" and $_GET['exito'] == "noagregado") echo "Hubo un error al realizar la compra";
        if($_GET['Listar'] == "Compras" and $_GET['exito'] == "modificado") echo "Se modificó la compra";
        if($_GET['Listar'] == "Compras" and $_GET['exito'] == "nomodificado") echo "Hubo un error al modificar la compra";
        if($_GET['Listar'] == "Compras" and $_GET['exito'] == "eliminado") echo "Se eliminó la compra";
        if($_GET['Listar'] == "Compras" and $_GET['exito'] == "noeliminado") echo "Hubo un error al eliminar la compra";
        
        
    ?>
    
</body>
</html>