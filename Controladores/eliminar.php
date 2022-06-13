<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php'); 
    require_once($config['APP_Controller'] . '/conectarBase.php');
    $Location = "Location: " . $config['Vistas'] . "/Listar.php?Listar=" . $_GET['Listar'];
    if (! $_GET['Listar'] or ! $_GET['id']) {
        header('Location: /Vistas/404.php');
    }

    $ID = $_GET['id'];

    if ($_GET['Listar'] == "Personas") {
        $sql = "DELETE FROM persona where id=" . $ID;
    }

    if ($_GET['Listar'] == "Productos") {
        $sql = "DELETE FROM producto where id=" . $ID;
    }

    if ($_GET['Listar'] == "Compras") {
        $sql = "DELETE FROM compra where id=" . $ID;
    }

    if($con -> query($sql) === TRUE ) header($Location . '&exito=eliminado');
    else header($Location . '&exito=noeliminado');