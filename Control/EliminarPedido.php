<?php
include('ConexionBd.php');
$id_producto = 0;

if (isset($_GET['idproducto']) && isset($_GET['idpersona']) && isset($_GET['fecha']) ){
    $id_producto = $_GET['idproducto'];
    $id_persona = $_GET['idpersona'];
    $fecha = $_GET['fecha'];
}

$Eliminar = " DELETE FROM `compra` WHERE `id_persona` = $id_persona AND `id_producto` = $id_producto AND `fecha_hora` = '$fecha';";
$SumarStock = "UPDATE producto SET stock = stock + 1 where id = $id_producto;";

$resultado = mysqli_query($conexion, $Eliminar);
$resultado = mysqli_query($conexion, $SumarStock);

if($resultado){
    echo "<script>alert('Se Eliminaron los datos de forma correcta');window.location='../index.php';</script>";
}else{
    echo "<script>alert('Ups, los datos no se ingresaron');</script>";
}

mysqli_close($conexion);


?>
