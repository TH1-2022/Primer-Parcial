<?php
require_once("../config.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];



$sql = "UPDATE persona SET 
        nombre = '$nombre',
        apellido = '$apellido',
        telefono = $telefono,
        email = '$email'
        WHERE id = $id";
if ($db->query($sql))
    header("Location: ../index.php?success=1");
else
    header("Location: ../index.php?err=1");
