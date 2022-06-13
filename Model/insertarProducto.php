<?php
require_once("../config.php");

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
if ($_POST['stock'] != "") {
    $stock = $_POST['stock'];
} else {
    $stock = 0;
}

$sql = "INSERT INTO producto (nombre, descripcion, stock) VALUES('$nombre','$descripcion',$stock)";
if ($db->query($sql))
    header("Location: ../crearProducto.php?success=1");
else
    header("Location: ../crearProducto.php?err=1");
