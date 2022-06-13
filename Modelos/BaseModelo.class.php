<?php

class BaseModelo {

public $hostDB = '127.0.0.1';
public $usuarioDB = 'root';
public $passDB = '';
public $DB = 'parcial';
public $conexion; 


function __construct(){

$this-> conexion = new mysqli($this->hostDB, $this->usuarioDB, $this->passDB, $this->DB);


}



}