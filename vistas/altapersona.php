<?php

    require "../utils/autoload.php";

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    PersonaControlador::Alta($nombre, $apellido, $telefono, $email);