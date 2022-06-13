<?php
$conexion = mysqli_connect('localhost','root','','compras');
mysqli_set_charset($conexion,"utf8");
if($conexion -> connect_error){
	echo "Ups, hay problemas con la base de datos";
	exit;
};
?>