<?php
require_once("../config.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
if ($_POST['telefono'] != "") {
    $telefono = $_POST['telefono'];
} else {
    $telefono = 0;
}
$email = $_POST['email'];

$sql = "INSERT INTO persona (nombre, apellido, telefono, email) VALUES('$nombre','$apellido',$telefono,'$email')";
if ($db->query($sql))
    header("Location: ../index.php?success=1");
else
    header("Location: ../index.php?err=1");
