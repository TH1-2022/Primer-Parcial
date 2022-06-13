<?php
require_once("../config.php");

$persona = $_POST['persona'];
$persona_old = $_POST['persona_old'];
$producto = $_POST['producto'];
$producto_old = $_POST['producto_old'];
$fecha_hora = $_POST['fecha_hora'];

$sql = "UPDATE compra SET 
id_persona = '$persona',
id_producto = '$producto'
WHERE id_persona = $persona_old and id_producto = $producto_old and fecha_hora = '$fecha_hora'";
if ($db->query($sql))
  header("Location: ../crearCompra.php?success=1");
else
  header("Location: ../crearCompra.php?err=1");
