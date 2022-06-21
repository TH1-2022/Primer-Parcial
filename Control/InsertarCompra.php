<?php
include('ConexionBd.php');


if (isset($_POST['compra']) && isset($_POST['persona']) ){
    $id_producto = $_POST['compra'];
    $id_persona = $_POST['persona'];
}


$Insertar = "INSERT INTO `compra` (`id_persona`, `id_producto`, `fecha_hora`) VALUES ($id_persona, $id_producto,NOW())";
$RestarStock = "UPDATE producto SET stock = stock - 1 where id = $id_producto;";
$resultado = mysqli_query($conexion, $Insertar);
$resultado = mysqli_query($conexion, $RestarStock);

if($resultado){
    echo "<script>alert('Se ingresaron los datos de forma correcta');window.location='../index.php';</script>";
}else{
    echo "<script>alert('Ups, los datos no se ingresaron');</script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
