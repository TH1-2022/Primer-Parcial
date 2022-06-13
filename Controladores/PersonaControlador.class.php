<?php

require "autoload.php";

class PersonaModelo extends BaseModelo{

    public $Id;
    public $Nombre;
    public $Apellido;
    public $Telefono;
    public $Email;






    public function ObtenerPersonas(){

        $sql = "SELECT * FROM persona";
        $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);

        $resultado = array();
        foreach($filas as $fila){
            $p = new PersonaModelo();
            $p -> id = $fila['id'];
            $p -> nombre = $fila['nombre'];
            $p -> apellido = $fila['apellido'];
            $p -> telefono = $fila['telefono'];
            $p -> email = $fila['email'];
            
            array_push($resultado,$p);
        }
        return $resultado;

    }








}