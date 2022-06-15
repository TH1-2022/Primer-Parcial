<!DOCTYPE html>
<html lang="es">
    
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php'); 
        require_once($config['APP_Controller'] . '/conectarBase.php');
        
        $PAGENAME='Comprar';
        require_once ($config['APP_Vistas'] . '/head.php');
    ?>

<body>

    <?php
        require_once ($config['APP_Vistas'] . '/menu.php');
    ?>
        
    <?php
        $sql = "SELECT * FROM producto";
        $resultados = $con -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    ?>
    
    <table cellpadding="1"cellspacing="5">
    <tr>
        <td>ID Persona</td>
        <td>ID Producto</td>
        <td>Nombre Producto</td>
        <td>Descripcion</td>
        <td>Stock</td>
        <td>Accion</td>
    </tr>
    <?php foreach ($resultados as $resultado): ?>
        <form action=<?=$config['Controllers'] . "/RealizarCompra.php" ?> method="post">
            <tr>
                <td><input type="text" name="idP" size="4" maxlength="5" value="1"></td>
                <td><input type="text" name="idC" value="<?= $resultado['id'] ?>" size="5" readonly></td>
                <td><input type="text" name="nombre" value="<?= $resultado['nombre'] ?>" size="40" readonly></td>
                <td><textarea name="descripcion" rows="<?= substr_count($resultado['descripcion'], "\n")+1 ?>" cols="50" wrap="soft" readonly><?= $resultado['descripcion'] ?></textarea></td>
                <td><input type="text" name="stock" value="<?= $resultado['stock'] ?>" size="5" readonly></td>
                <td><input type="submit" value="Comprar"></td>
            </tr>
        </form>
    <?php endforeach ?>
    </table>

    <?php 
         if($_GET['exito'] == "compra") echo "Se realizó correctamente la compra";
         if($_GET['exito'] == "nocompra") echo "Hubo un error al realizar la compra";
