<?php

require "autoload.php";

class PersonaModelo extends BaseModelo{

    public $Id;
    public $Nombre;
    public $Apellido;
    public $Telefono;
    public $Email;



    public function __construct($id=""){

        parent::__construct();
        
        if($id != ""){
            $this -> Id = $id;
            $this -> Obtener();
        }

    }



    public function Guardar(){

        if($this -> Id == NULL) $this -> insertar();
        else $this -> actualizar();

    }

    private function insertar(){

        $sql = "INSERT INTO persona (nombre,apellido,telefono,email) VALUES (
            '" . $this -> Nombre . "',
            '" . $this -> Apellido . "',
            '" . $this -> Telefono . "',
            '" . $this -> Email . "')";

            $this -> conexion -> query($sql);

    }


    private function actualizar(){

        $sql = "UPDATE persona SET
        nombre = '" . $this -> Nombre . "',
        apellido = '" . $this -> Apellido . "',
        telefono = '" . $this -> Telefono . "',
        email = '" . $this -> Email . "'
        WHERE (id = " . $this -> Id .")";

        $this -> conexion -> query($sql);

    }
    
    public function Eliminar(){

        $sql = "DELETE FROM persona WHERE id = " . $this ->Id;
        $this -> conexion -> query($sql);
        
    }



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



    public function Obtener(){

            $sql = "SELECT * FROM persona WHERE id = " . $this ->Id;
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
    
            $this -> Id = $fila['id'];
            $this -> nombre = $fila['nombre'];
            $this -> apellido = $fila['apellido'];
            $this -> telefono = $fila['telefono'];
            $this -> email = $fila['email'];
        }


    }




