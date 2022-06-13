<?php 
    require $_SERVER['DOCUMENT_ROOT'] . "/utils/autoload.php";

    if (isset($_GET['Menu']) && $_GET['Menu'] === "MCA" ) {
        CompraControlador::Alta(
        $_POST["idPersona"],
        $_POST["idProducto"]
        );
    }

    class CompraControlador {

        public static function Alta($ippersona,$ipproducto){
            $c = new CompraModelo();
            $c -> IdPersona = $ippersona;
            $c -> IdProducto = $ipproducto;
            $c -> Insertar();
            ProductoControlador::ModificarStock($ipproducto);
        }

        public static function EliminarPersona($id){
            $p = new CompraModelo();
            $p -> EliminarPersona($id);
        }

        public static function EliminarProducto($id){
            $p = new CompraModelo();
            $p -> EliminarProducto($id);
        }

        public static function Listar(){
            $c = new CompraModelo();
            $compras = $c -> ObtenerTodos();

            $resultado = array();
            foreach($compras as $elemento){
                $a = array(
                    'id_persona' => $elemento -> IdPersona,
                    'id_producto' => $elemento -> IdProducto,
                    'fecha_hora' => $elemento -> FechaYHora,
                    'nombre' => $elemento -> Nombre,
                    'descripcion' => $elemento -> Descripcion,
                );
                array_push($resultado,$a);
            }
            return $resultado;
            

        }
    }