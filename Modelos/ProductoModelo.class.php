<?php

require "autoload.php";

class ProductoModelo extends BaseModelo{

    public $Id;
    public $Nombre;
    public $Descripcion;
    public $Stock;

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

        $sql = "INSERT INTO producto (nombre,descripcion,stock) VALUES (
            '" . $this -> Nombre . "',
            '" . $this -> Descripcion . "',
            '" . $this -> Stock . "')";

            $this -> conexion -> query($sql);

    }

    public function ObtenerProductos(){

        $sql = "SELECT * FROM producto";
        $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);

        $resultado = array();
        foreach($filas as $fila){
            $p = new ProductoModelo();
            $p -> id = $fila['id'];
            $p -> nombre = $fila['nombre'];
            $p -> descripcion = $fila['descripcion'];
            $p -> stock = $fila['stock'];
            array_push($resultado,$p);
        }


        return $resultado;

    }


        public function Obtener(){

            $sql = "SELECT * FROM producto WHERE id = " . $this ->Id;
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
    
            $this -> Id = $fila['id'];
            $this -> nombre = $fila['nombre'];
            $this -> descripcion = $fila['descripcion'];
            $this -> stock = $fila['stock'];
        }




}