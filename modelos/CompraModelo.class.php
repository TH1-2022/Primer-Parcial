<?php 

require "../utils/autoload.php";

    class CompraModelo extends Modelo{
        public $IdPersona;
        public $IdProducto;
        public $FechaYHora;

        public function __construct(){
            parent::__construct();
        }

        public function Guardar(){
            if($this -> FechaYHora == NULL) $this -> insertar();
            else $this -> insertarConFecha();
        }

        private function insertar(){
            $sql = "INSERT INTO compra VALUES(" . 
            $this -> IdPersona . ", " . 
            $this -> IdProducto . ", 
            now())";
            $this -> conexionBaseDeDatos -> query($sql);
        }

        private function insertarConFecha(){
            $sql = "INSERT INTO compra VALUES(" . 
            $this -> IdPersona . ", " . 
            $this -> IdProducto . ", '" . 
            $this -> FechaYHora . "')";
            echo $sql;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function Eliminar(){
            $sql = "DELETE FROM compra WHERE 
            id_persona = " . $this -> IdPersona . " AND 
            id_producto = " . $this -> IdProducto . " AND 
            fecha_hora = '" . $this -> FechaYHora . "'";
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM compra";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $compra = new CompraModelo();
                $compra -> IdPersona = $fila['id_persona'];
                $compra -> IdProducto = $fila['id_producto'];
                $compra -> FechaYHora = $fila['fecha_hora'];
                array_push($resultado,$compra);
            }
            return $resultado;

        }

    }