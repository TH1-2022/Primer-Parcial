<?php

require_once("../config.php");

$persona = $_POST['persona'];
$producto = $_POST['producto'];
$fecha = date('Y-m-d H:i:s');
$elemento_producto = $db->query("SELECT * FROM producto WHERE id =" . $producto)->fetch_all(MYSQLI_ASSOC)[0];
$nuevo_stock = $elemento_producto['stock'] - 1;

$sql = "INSERT INTO compra (id_persona,id_producto,fecha_hora) VALUES($persona,$producto,'$fecha')";
$db->query("UPDATE producto SET stock=$nuevo_stock where id=" . $producto);

if ($db->query($sql))
    header("Location: ../crearCompra.php?success=1");
else
    header("Location: ../crearCompra.php?err=1");
