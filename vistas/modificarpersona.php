<?php

    require "../utils/autoload.php";

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    PersonaControlador::Modificar($id, $nombre, $apellido, $telefono, $email);