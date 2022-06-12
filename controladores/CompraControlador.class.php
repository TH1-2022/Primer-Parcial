<?php 
    require "../../utils/autoload.php";

    class CompraControlador {
        public static function Alta($idPersona, $idProducto, $fechaYHora){
            $compra = new CompraModelo();
            $compra -> IdPersona = $idPersona;
            $compra -> IdProducto = $idProducto;
            $compra -> FechaYHora = $fechaYHora;
            $compra -> Guardar();
        }

        public static function Eliminar($idPersona, $idProducto, $fechaYHora){
            $compra = new CompraModelo();
            $compra -> IdPersona = $idPersona;
            $compra -> IdProducto = $idProducto;
            $compra -> FechaYHora = $fechaYHora;
            $compra -> Eliminar();
        }

        public static function Listar(){
            $compra = new CompraModelo();
            $compras = $compra -> ObtenerTodos();

            $resultado = array();
            foreach($compras as $elemento){
                $array = array(
                    'id_persona' => $elemento -> IdPersona,
                    'id_producto' => $elemento -> IdProducto,
                    'fecha_hora' => $elemento -> FechaYHora,
                    'nombre_persona' => $elemento -> NombrePersona,
                    'apellido_persona' => $elemento -> ApellidoPersona,
                    'telefono_persona' => $elemento -> TelefonoPersona,
                    'email_persona' => $elemento -> EmailPersona,
                    'nombre_producto' => $elemento -> NombreProducto,
                    'descripcion_producto' => $elemento -> DescripcionProducto,
                    'stock_producto' => $elemento -> StockProducto,
                );
                array_push($resultado,$array);
            }
            return $resultado;
            

        }
    }
