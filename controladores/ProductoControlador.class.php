<?php 
    require $_SERVER['DOCUMENT_ROOT'] . "/utils/autoload.php";

    if (isset($_GET['Menu']) && $_GET['Menu'] === "MPrA" ) {
        ProductoControlador::Alta(
        $_POST["nombre"],
        $_POST["descripcion"],
        $_POST["stock"]
        );
    }

    if (isset($_GET['Menu']) && $_GET['Menu'] === "MPrM" ) {
        ProductoControlador::Modificar(
        $_POST["id"],
        $_POST["nombre"],
        $_POST["descripcion"],
        $_POST["stock"]
        );
    }

    class ProductoControlador {

        public static function Alta($nombre,$descripcion,$stock){
            $p = new ProductoModelo();
            $p -> Nombre = $nombre;
            $p -> Descripcion = $descripcion;
            $p -> Stock = $stock;
            $p -> Guardar();

        }

        public static function Eliminar($id){
            $p = new ProductoModelo($id);
            $p -> Eliminar();
        }


        public static function Modificar($id,$nombre,$descripcion,$stock){
            $p = new ProductoModelo($id);
            $p -> Nombre = $nombre;
            $p -> Descripcion = $descripcion;
            $p -> Stock = $stock;
            $p -> Guardar();
        }

        public static function ModificarStock($id){
            $p = new ProductoModelo($id);
            $p -> ActualizarStock();
        }

        public static function Mostrar($id){
            $p = new ProductoModelo($id);
            $p -> Guardar();
            $producto = array(
                'id' => $p -> Id,
                'nombre' => $p -> Nombre,
                'descripcion' => $p -> Descripcion,
                'stock' => $p -> Stock
            );
            return $producto;
        }

        public static function Listar(){
            $p = new ProductoModelo();
            $productos = $p -> ObtenerTodos();

            $resultado = array();
            foreach($productos as $elemento){
                $a = array(
                    'id' => $elemento -> Id,
                    'nombre' => $elemento -> Nombre,
                    'descripcion' => $elemento -> Descripcion,
                    'stock' => $elemento -> Stock,
                );
                array_push($resultado,$a);
            }
            return $resultado;
            

        }
    }