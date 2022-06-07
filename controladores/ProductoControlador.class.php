<?php 
    require "utils/autoload.php";

    class ProductoControlador {
        public static function Alta($nombre,$descripcion,$stock){
            $producto = new ProductoModelo();
            $producto -> Nombre = $nombre;
            $producto -> Descripcion = $descripcion;
            $producto -> Stock = $stock;
            $producto -> Guardar();

        }

        public static function Eliminar($id){
            $producto = new Producto($id);
            $producto -> Eliminar();
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
    }

