<?php 
    require "../../utils/autoload.php";

    class PersonaControlador {
        public static function Alta($nombre,$apellido,$telefono,$email){
            $persona = new PersonaModelo();
            $persona -> Nombre = $nombre;
            $persona -> Apellido = $apellido;
            $persona -> Telefono = $telefono;
            $persona -> Email = $email;
            $persona -> Guardar();

        }

        public static function Eliminar($id){
            $persona = new PersonaModelo($id);
            if(!$persona -> Eliminar()){
                return false;
            }
        }

        public static function Modificar($id,$nombre,$apellido,$telefono,$email){
            $persona = new PersonaModelo($id);
            $persona -> Nombre = $nombre;
            $persona -> Apellido = $apellido;
            $persona -> Telefono = $telefono;
            $persona -> Email = $email;
            $persona -> Guardar();
        }

        public static function Listar(){
            $persona = new PersonaModelo();
            $personas = $persona -> ObtenerTodos();

            $resultado = array();
            foreach($personas as $elemento){
                $array = array(
                    'id' => $elemento -> Id,
                    'nombre' => $elemento -> Nombre,
                    'apellido' => $elemento -> Apellido,
                    'telefono' => $elemento -> Telefono,
                    'email' => $elemento -> Email
                );
                array_push($resultado,$array);
            }
            return $resultado;
            

        }
    }

