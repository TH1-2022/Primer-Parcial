<?php 
    require $_SERVER['DOCUMENT_ROOT'] . "/utils/autoload.php";

    class PersonaModelo extends conexionModelo{
        public $Id;
        public $Nombre;
        public $Apellido;
        public $Telefono;
        public $Email;

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
            $sql = "INSERT INTO persona (nombre,apellido,telefono,email) VALUES (
                '" . $this -> Nombre . "',
                '" . $this -> Apellido . "',
                " . $this -> Telefono . ",
                '" . $this -> Email . "')";
            $this -> conexionBaseDeDatos -> query($sql);
            if (isset($_GET['Menu']) && $_GET['Menu'] === "MPeA" ) {
                echo "Para regresar al menu presione <a href='/index.php'>Volver</a>";
            }         
        }

        private function actualizar(){
            $sql = "UPDATE persona SET 
                nombre = '" . $this -> Nombre . "',
                apellido = '" . $this -> Apellido . "',
                telefono = " . $this -> Telefono . ",
                email = '" . $this -> Email . "'
                WHERE id = " . $this -> Id;
            $this -> conexionBaseDeDatos -> query($sql);
            if (isset($_GET['Menu']) && $_GET['Menu'] === "MPeM" ) {
                echo "Para regresar al menu presione <a href='/index.php'>Volver</a>";
            }
        }
      
        public function Eliminar(){
            $sql = "DELETE FROM persona WHERE id = " . $this ->Id;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        private function obtener(){
            $sql = "SELECT * FROM persona WHERE id = " . $this -> Id;
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> Id = $fila['id'];
            $this -> Nombre = $fila['nombre'];
            $this -> Apellido = $fila['apellido'];
            $this -> Telefono = $fila['telefono'];
            $this -> Email = $fila['email'];
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM persona";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $p = new PersonaModelo();
                $p -> Id = $fila['id'];
                $p -> Nombre = $fila['nombre'];
                $p -> Apellido = $fila['apellido'];
                $p -> Telefono = $fila['telefono'];
                $p -> Email = $fila['email'];
                array_push($resultado,$p);
            }
            return $resultado;
        }

    }
    