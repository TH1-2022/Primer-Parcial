<?php

require "autoload.php";



if(!isset($_REQUEST['controlador'])){

   require_once "Vistas/principal.php";

}else{


    $controlador = $_REQUEST['controlador']; 
    $metodo = $_REQUEST['metodo'];
    $clase =  $controlador . "Controlador";
    $clase::$metodo();



}
