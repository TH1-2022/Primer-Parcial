<?php
session_start();
include('ConexionBd.php');


if (isset($_POST['compra']) && isset($_POST['id']) ){
    $id_producto = $_POST['compra'];
    $id_persona = $_POST['id'];
}


$productoQuitar = $_SESSION["idproducto"];
$fechacompra = $_SESSION["fecha"];


$QuitarStock = "UPDATE producto SET stock = stock - 1 where id = $id_producto;";
$AgregarStock ="UPDATE producto SET stock = stock + 1 where id = $productoQuitar;";
$Modificar = "UPDATE compra SET id_producto = $id_producto where id_persona = $id_persona and id_producto = $productoQuitar and fecha_hora = '$fechacompra' ;";

$resultado = mysqli_query($conexion, $Modificar);
$resultado = mysqli_query($conexion, $QuitarStock);
$resultado = mysqli_query($conexion, $AgregarStock);

if($resultado){
    echo "<script>alert('Se ingresaron los datos de forma correcta');window.location='../index.php';</script>";
}else{
    echo "<script>alert('Ups, los datos no se ingresaron');</script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
