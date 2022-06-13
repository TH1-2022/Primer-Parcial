<?php

require "autoload.php";


class CompraControlador {


    public static function FormularioCompra(){
        require_once "Vistas/FormularioCompra.php";
    }

    
   public static function Alta($id_persona,$id_producto,$fecha_hora) {

    var_dump($fecha_hora);
        
        $c = new CompraModelo();
        $c -> id_persona = $id_persona;
        $c -> id_producto = $id_producto;
        $c -> fecha_hora = $fecha_hora;
        $c -> Guardar();
        self::ActualizarStock($c->id_producto);

    }

public static function Lista(){
    $c = new CompraModelo();
    $compras = $c -> ObtenerCompras();
    $listadoDeCompras = self::FormatearResultado($compras);
    return $listadoDeCompras; 
}


private static function FormatearResultado($compras){

    $listadocompras = array();
    while($compra = $compras->fetch_assoc()){
    $persona = $compra['NombrePersona'] . " " . $compra['ApellidoPersona'];
        
    $productosEncompra = array(

           'NombreProducto' => $compra["NombreProducto"],
           'DescProducto' => $compra["DescProducto"]
        );
  
        $listadocompras[$persona][] = $productosEncompra;
  
    } 

    return $listadocompras;

}


private static function ActualizarStock($id){

    $a = new ProductoModelo($id);
    $a -> RestaDeStock($id);



}








}