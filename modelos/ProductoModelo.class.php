<?php 

require "../../utils/autoload.php";

    class ProductoModelo extends Modelo{
        public $Id;
        public $Nombre;
        public $Descripcion;
        public $Stock;
        public $Email;

        public function __construct($id = ""){
            parent::__construct();
            if($id != ""){
                $this -> Id = $id;
                $this -> Obtener();
            }
        }

        public function Guardar(){
            if($this -> Id == NULL){
                if($this -> insertar() === false){
                    return false;
                }
            }else{
                if($this -> actualizar() === false){
                    return false;
                }
            }
        }

        private function insertar(){
            $sql = "INSERT INTO producto (nombre,descripcion,stock) VALUES (
            '" . $this -> Nombre . "',
            '" . $this -> Descripcion . "',
            " . $this -> Stock . ")";
            return $this -> conexionBaseDeDatos -> query($sql);
        }

        private function actualizar(){
            $sql = "UPDATE producto SET
            nombre = '" . $this -> Nombre . "',
            descripcion = '" . $this -> Descripcion . "',
            stock = " . $this -> Stock . "
            WHERE id = " . $this -> Id;
            return $this -> conexionBaseDeDatos -> query($sql);
        }

        public function Obtener(){
            $sql = "SELECT * FROM producto WHERE id = " . $this -> Id;
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> Id = $fila['id'];
            $this -> Nombre = $fila['nombre'];
            $this -> Descripcion = $fila['descripcion'];
            $this -> Stock = $fila['stock'];
        }

        public function Eliminar(){
            $sql = "DELETE FROM producto WHERE id = " . $this -> Id;
            return $this -> conexionBaseDeDatos -> query($sql);
        }

        public function RestarStock(){
            $sql = "UPDATE producto SET stock" .  " = " .  "stock -1 WHERE id =" . $this -> Id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM producto";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $producto = new ProductoModelo();
                $producto -> Id = $fila['id'];
                $producto -> Nombre = $fila['nombre'];
                $producto -> Descripcion = $fila['descripcion'];
                $producto -> Stock = $fila['stock'];
                array_push($resultado,$producto);
            }
            return $resultado;

        }

    }