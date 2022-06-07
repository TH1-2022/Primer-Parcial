<?php 

require "utils/autoload.php";

    class ProductoModelo extends Modelo{
        public $Id;
        public $Nombre;
        public $Descripcion;
        public $Stock;
        public $Email;

        public function __construct($id=""){
            parent::__construct();
            if($id != ""){
                $this -> id = $id;
                $this -> Obtener();
            }
        }

        public function Guardar(){
            if($this -> Id == NULL) $this -> insertar();
            else $this -> actualizar();
        }

        private function insertar(){
            $sql = "INSERT INTO prdocuto (nombre,descripcion,stock) VALUES (
            '" . $this -> Nombre . "',
            '" . $this -> Descripcion . "',
            " . $this -> Stock . ")";
            $this -> conexionBaseDeDatos -> query($sql);
        }

        private function actualizar(){
            $sql = "UPDATE producto SET
            nombre = '" . $this -> Nombre . "',
            descripcion = '" . $this -> Descripcion . "',
            stock = " . $this -> Stock . "
            WHERE id = " . $this -> id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function Obtener(){
            $sql = "SELECT * FROM prodcuto WHERE id = " . $this ->id;
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> id = $fila['id'];
            $this -> nombre = $fila['nombre'];
            $this -> descripcion = $fila['descripcion'];
            $this -> stock = $fila['stock'];
        }

        public function Eliminar(){
            $sql = "DELETE FROM producto WHERE id = " . $this ->Id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM producto";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $pr = new ProductoModelo();
                $pr -> Id = $fila['id'];
                $pr -> Nombre = $fila['nombre'];
                $pr -> Descripcion = $fila['descripcion'];
                $pr -> Stock = $fila['stock'];
                array_push($resultado,$pr);
            }
            return $resultado;

        }

    }