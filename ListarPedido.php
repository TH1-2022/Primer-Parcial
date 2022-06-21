<?php
include('Control/ConexionBd.php');
$detalleCompra = "SELECT * FROM compra";
$resultadocompra = mysqli_query($conexion, $detalleCompra);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <table border = "1" width="75%">
        <thead>
            <td>Comprador</td>
            <td>Producto</td>
            <td>Fecha</td>
            <td>Modificar</td>
            <td>Eliminar</td>
        </thead>

        <tbody>
            <?php

            while ($fila = mysqli_fetch_array($resultadocompra)) {

                $idproducto = ($fila['id_producto']);
                $detalleProducto = "SELECT * FROM producto WHERE id = $idproducto";
                $resultadoproducto = mysqli_query($conexion, $detalleProducto);
                while ($producto = mysqli_fetch_array($resultadoproducto)) {
                    $detalleProducto = "Producto: " . ($producto['nombre']) . " Descipcion: " . ($producto['descripcion']) . " ";
                }

                $idpersona = ($fila['id_persona']);
                $detallePersona = "SELECT * FROM persona WHERE id = $idpersona";
                $resultadoPersona = mysqli_query($conexion, $detallePersona);
                while ($persona = mysqli_fetch_array($resultadoPersona)) {
                    $detallePersona = ($persona['nombre']) . " " . ($persona['apellido']) . " ";
                }

            ?>
                <tr>
                    <td><?php echo $detallePersona; ?></td>
                    <td><?php echo $detalleProducto; ?></td>
                    <td><?php echo ($fila['fecha_hora']); ?></td>
                    <td>
                        <?php
                        $idProductoCompra = ($fila['id_producto']);
                        $idPersonaCompra = ($fila['id_persona']);
                        $fecha = ($fila['fecha_hora']);
                        $link = "Modificar.php?idproducto=$idProductoCompra&idpersona=$idPersonaCompra&fecha=$fecha&nombre=$detallePersona"
                        ?>
                        <a href="<?php echo $link; ?>">Modificar</a>
                    </td>
                    <td>
                        <?php
                        $link = "Control/EliminarPedido.php?idproducto=$idProductoCompra&idpersona=$idPersonaCompra&fecha=$fecha"
                        ?>
                        <a href="<?php echo $link; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php
            }

            ?>
        </tbody>

    </table>
</body>

</html>