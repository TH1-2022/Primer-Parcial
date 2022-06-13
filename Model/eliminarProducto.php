<?php
require_once("../config.php");

$sql = "DELETE FROM producto WHERE id = " . $_GET['id'];
if ($db->query($sql))
    header("Location: ../crearProducto.php?success=1");
else
    header("Location: ../crearProducto.php?err=1");
