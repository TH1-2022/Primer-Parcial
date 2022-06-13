<?php

require "autoload.php";



class ProductoControlador {



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