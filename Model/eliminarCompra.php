	<?php

    require_once("../config.php");

    $elemento_producto = $db->query("SELECT * FROM producto WHERE id =" . $_GET['id_producto'])->fetch_all(MYSQLI_ASSOC)[0];
    $nuevo_stock = $elemento_producto['stock'] + 1;
    $db->query("UPDATE producto SET stock=$nuevo_stock where id=" . $_GET['id_producto']);

    $sql = "DELETE FROM compra WHERE id_persona =" . $_GET['id_persona'] . " and id_producto=" . $_GET['id_producto'] . " and fecha_hora='" . $_GET['fecha_hora'] . "'";
    
    if ($db->query($sql))
        header("Location: ../crearCompra.php?success=1");
    else
        header("Location: ../crearCompra.php?err=1");
