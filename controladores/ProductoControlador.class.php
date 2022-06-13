<?php 
    require "../../utils/autoload.php";

    class ProductoControlador {
        public static function Alta($nombre,$descripcion,$stock){
            $producto = new ProductoModelo();
            $producto -> Nombre = $nombre;
            $producto -> Descripcion = $descripcion;
            $producto -> Stock = $stock;
            $producto -> Guardar();

        }

        public static function Eliminar($id){
            $producto = new ProductoModelo($id);
            if(!$producto -> Eliminar()){
                return false;
            }
        }


        public static function Modificar($id,$nombre,$descripcion,$stock){
            $producto = new ProductoModelo($id);
            $producto -> Nombre = $nombre;
            $producto -> Descripcion = $descripcion;
            $producto -> Stock = $stock;
            $producto -> Guardar();
        }

        public static function Listar(){
            $producto = new ProductoModelo();
            $productos = $producto -> ObtenerTodos();

            $resultado = array();
            foreach($productos as $elemento){
                $array = array(
                    'id' => $elemento -> Id,
                    'nombre' => $elemento -> Nombre,
                    'descripcion' => $elemento -> Descripcion,
                    'stock' => $elemento -> Stock
                );
                array_push($resultado,$array);
            }
            return $resultado;
        }

        public static function VerificarStock($id){
            $producto = new ProductoModelo($id);
            if($producto -> Stock > 0){
                return true;
            }else{
                return false;
            }
        }

        public static function RestarStock($id){
            $producto = new ProductoModelo($id);
            return $producto -> RestarStock();
        }
    }

