<?php
include('ConexionBd.php');
$id_producto = 0;

if (isset($_POST['compra']) && isset($_POST['persona']) ){
    $id_producto = $_POST['compra'];
    $id_persona = $_POST['persona'];
}


$Insertar = "INSERT INTO `compra` (`id_persona`, `id_producto`, `fecha_hora`) VALUES ($id_persona, $id_producto,NOW())";
$resultado = mysqli_query($conexion, $Insertar);

if($resultado){
    echo "<script>alert('Se ingresaron los datos de forma correcta');window.location='../Comprar.php';</script>";
}else{
    echo "<script>alert('Ups, los datos no se ingresaron');</script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);


?>
