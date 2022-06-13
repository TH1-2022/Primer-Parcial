<?php

require "autoload.php";



class ProductoControlador {


    public static function FormularioAlta(){
        require_once "Vistas/FormularioAltaProducto.php";
    }

    public static function FormularioModificar(){
        $p = new ProductoModelo($_GET['id']);
        require_once "Vistas/FormularioModificarProducto.php";
        }


        public static function Alta(){
            $p = new ProductoModelo();    
            $p -> Nombre = $_POST['nombre'];
            $p -> Descripcion = $_POST['descripcion'];
            $p -> Stock = $_POST['stock'];
            $p -> Guardar();
            header("Location: /Parcial/index.php");
            }



    public static function Listar(){

        $prod = new ProductoModelo();
        $productos = $prod -> ObtenerProductos();
    
        $listadoproductos = array();
    
        foreach($productos as $fila){
    
            $p = array( 
                'id' => $fila -> id, 
                'nombre' => $fila -> nombre, 
                'descripcion' => $fila -> descripcion,
                'stock' => $fila -> stock
            );
           
            array_push($listadoproductos, $p);
        }
    
        return $listadoproductos;
    
    
    }



}