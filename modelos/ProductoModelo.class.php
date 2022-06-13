<?php 

require $_SERVER['DOCUMENT_ROOT'] . "/utils/autoload.php";

    class ProductoModelo extends conexionModelo{
        public $Id;
        public $Nombre;
        public $Descripcion;
        public $Stock;

        public function __construct($id=""){
            parent::__construct();
            if($id != ""){
                $this -> Id = $id;
                $this -> obtener();
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
                " . $this -> Stock . ")";
            $this -> conexionBaseDeDatos -> query($sql);
            if (isset($_GET['Menu']) && $_GET['Menu'] === "MPrA" ) {
                echo "Para regresar al menu presione <a href='/index.php'>Volver</a>";
            }
        }

        private function actualizar(){
            $sql = "UPDATE producto SET 
                nombre = '" . $this -> Nombre . "',
                descripcion = '" . $this -> Descripcion . "',
                stock = " . $this -> Stock . "
                WHERE id = " . $this -> Id;
            $this -> conexionBaseDeDatos -> query($sql);
            if (isset($_GET['Menu']) && $_GET['Menu'] === "MPrM" ) {
                echo "Para regresar al menu presione <a href='/index.php'>Volver</a>";
            }
        }

        public function ActualizarStock(){
            $sql = "UPDATE producto SET
                stock = stock - 1
                WHERE id = " . $this -> Id;
            $this -> conexionBaseDeDatos -> query($sql);
        }
      
        public function Eliminar(){
            $sql = "DELETE FROM producto WHERE id = " . $this ->Id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        private function obtener(){
            $sql = "SELECT * FROM producto WHERE id = " . $this -> Id;
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> Id = $fila['id'];
            $this -> Nombre = $fila['nombre'];
            $this -> Descripcion = $fila['descripcion'];
            $this -> Stock = $fila['stock'];
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM producto";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $p = new ProductoModelo;
                $p -> Id = $fila['id'];
                $p -> Nombre = $fila['nombre'];
                $p -> Descripcion = $fila['descripcion'];
                $p -> Stock = $fila['stock'];
                array_push($resultado,$p);
            }
            return $resultado;
        }

    }