<?php

require "../utils/autoload.php";

$id = $_POST['id'];

PersonaControlador::Eliminar($id);