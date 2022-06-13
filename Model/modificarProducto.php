<?php
require_once("../config.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];



$sql = "UPDATE producto SET 
      nombre='$nombre',
      descripcion='$descripcion',
      stock=$stock
      WHERE id=$id";

if ($db->query($sql))
    header("Location: ../crearProducto.php?success=1");
else
    header("Location: ../crearProducto.php?err=1");
