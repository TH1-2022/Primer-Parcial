<?php 
    require $_SERVER['DOCUMENT_ROOT'] . "/utils/autoload.php";

    if (isset($_GET['Menu']) && $_GET['Menu'] === "MPeA" ) {
        PersonaControlador::Alta(
        $_POST["nombre"],
        $_POST["apellido"],
        $_POST["telefono"],
        $_POST["email"]
        );
    }

    if (isset($_GET['Menu']) && $_GET['Menu'] === "MPeM" ) {
        PersonaControlador::Modificar(
        $_POST["id"],
        $_POST["nombre"],
        $_POST["apellido"],
        $_POST["telefono"],
        $_POST["email"]
        );
    }

    class PersonaControlador {

        public static function Alta($nombre,$apellido,$telefono,$email){
            $p = new PersonaModelo();
            $p -> Nombre = $nombre;
            $p -> Apellido = $apellido;
            $p -> Telefono = $telefono;
            $p -> Email = $email;
            $p -> Guardar();

        }

        public static function Eliminar($id){
            $p = new PersonaModelo($id);
            $p -> Eliminar();
        }


        public static function Modificar($id,$nombre,$apellido,$telefono,$email){
            $p = new PersonaModelo($id);
            $p -> Nombre = $nombre;
            $p -> Apellido = $apellido;
            $p -> Telefono = $telefono;
            $p -> Email = $email;
            $p -> Guardar();
        }

        public static function Mostrar($id){
            $p = new PersonaModelo($id);
            $p -> Guardar();
            $persona = array(
                'id' => $p -> Id,
                'nombre' => $p -> Nombre,
                'apellido' => $p -> Apellido,
                'telefono' => $p -> Telefono,
                'email' => $p -> Email
            );
            return $persona;
        }

        public static function Listar(){
            $p = new PersonaModelo();
            $personas = $p -> ObtenerTodos();

            $resultado = array();
            foreach($personas as $elemento){
                $a = array(
                    'id' => $elemento -> Id,
                    'nombre' => $elemento -> Nombre,
                    'apellido' => $elemento -> Apellido,
                    'telefono' => $elemento -> Telefono,
                    'email' => $elemento -> Email
                );
                array_push($resultado,$a);
            }
            return $resultado;
        
        }
    }