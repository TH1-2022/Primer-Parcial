<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
    require_once ($config['APP_Controller'] . '/conectarBase.php');
    $Location = "Location: " . $config['Vistas'] . "/Listar.php?Listar=" . $_GET['Listar'];
    if (! $_GET['Listar'] or (! $_GET['id'] and ! $_GET['Listar'] == "Compras")) {
        header ('Location: /Vistas/404.php');
    } elseif ((! $_GET['idP'] or ! $_GET['idC']) and $_GET['Listar'] == "Compras") {
        header ('Location: /Vistas/404.php');
    }

    if ($_GET['Listar'] == "Personas") {
        $sql = "DELETE FROM persona where id=" . $_GET['id'];
    }

    if ($_GET['Listar'] == "Productos") {
        $sql = "DELETE FROM producto where id=" . $_GET['id'];
    }

    if ($_GET['Listar'] == "Compras") {
        $fecha_hora = date("Y-m-d\ H:i:s", strtotime($_GET['date']));
        $sql = "DELETE FROM compra where id_persona=" . $_GET['idP'] . " and id_producto=" . $_GET['idC'] . " and fecha_hora='$fecha_hora'";
    }

    if($con -> query($sql) === TRUE ) header($Location . '&exito=eliminado');
    else header($Location . '&exito=noeliminado&prueba='.$fecha_hora);