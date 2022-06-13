<?php 

require "../../utils/autoload.php";

    class CompraModelo extends Modelo{
        public $IdPersona;
        public $IdProducto;
        public $FechaYHora;

        public function __construct(){
            parent::__construct();
        }

        public function Guardar(){
            if($this -> FechaYHora == NULL){
                if($this -> insertar() === false){
                    return false;
                }
            }else{ 
                if($this -> insertarConFecha() === false){
                    return false;
                }
            }
        }

        private function insertar(){
            $sql = "INSERT INTO compra VALUES(" . 
            $this -> IdPersona . ", " . 
            $this -> IdProducto . ", 
            now())";
            return $this -> conexionBaseDeDatos -> query($sql);
        }

        private function insertarConFecha(){
            $sql = "INSERT INTO compra VALUES(" . 
            $this -> IdPersona . ", " . 
            $this -> IdProducto . ", '" . 
            $this -> FechaYHora . "')";
            return $this -> conexionBaseDeDatos -> query($sql);
        }

        public function Eliminar(){
            $sql = "DELETE FROM compra WHERE 
            id_persona = " . $this -> IdPersona . " AND 
            id_producto = " . $this -> IdProducto . " AND 
            fecha_hora = '" . $this -> FechaYHora . "'";
            return $this -> conexionBaseDeDatos -> query($sql);
        }
    }