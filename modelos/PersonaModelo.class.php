<?php 

require "utils/autoload.php";

    class PersonaModelo extends Modelo{
        public $Id;
        public $Nombre;
        public $Apellido;
        public $Telefono;
        public $Email;

        public function __construct($id = ""){
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
            " . $this -> Telefono . ",
            '" . $this -> Email . "')";
            $this -> conexionBaseDeDatos -> query($sql);
        }

        private function actualizar(){
            $sql = "UPDATE persona SET
            nombre = '" . $this -> Nombre . "',
            apellido = '" . $this -> Apellido . "',
            telefono = " . $this -> Telefono . ",
            email = '" . $this -> Email . "'
            WHERE id = " . $this -> Id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function Obtener(){
            $sql = "SELECT * FROM persona WHERE id = " . $this -> Id;
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> Id = $fila['id'];
            $this -> Nombre = $fila['nombre'];
            $this -> Apellido = $fila['apellido'];
            $this -> Telefono = $fila['telefono'];
            $this -> Email = $fila['email'];
        }

        public function Eliminar(){
            $sql = "DELETE FROM persona WHERE id = " . $this -> Id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM persona";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $persona = new PersonaModelo();
                $persona -> Id = $fila['id'];
                $persona -> Nombre = $fila['nombre'];
                $persona -> Apellido = $fila['apellido'];
                $persona -> Telefono = $fila['telefono'];
                $persona -> Email = $fila['email'];
                array_push($resultado,$persona);
            }
            return $resultado;

        }

    }