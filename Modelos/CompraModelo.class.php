<?php

class CompraModelo extends BaseModelo {

    public $id_persona;
    public $id_producto;
    public $fecha_hora;


    

    public function Guardar(){

        $sql = "INSERT INTO compra (id_persona,id_producto,fecha_hora) VALUES (
            '" . $this -> id_persona . "',
            '" . $this -> id_producto . "',
            '" . $this ->  fecha_hora . "')";

            $this -> conexion -> query($sql);

    }



public function ObtenerCompras(){

    $sql = " SELECT persona.nombre as NombrePersona, persona.apellido as ApellidoPersona, persona.email, producto.nombre as NombreProducto, producto.descripcion as DescProducto "; 
    $sql .= " FROM  persona "; 
    $sql .= " JOIN compra ";
    $sql .= " ON persona.id = compra.id_persona ";
    $sql .= " JOIN producto ";
    $sql .= " ON compra.id_producto = producto.id ORDER BY persona.id; ";
    $compras = $this -> conexion -> query($sql);
    return $compras;

}



public function Eliminar(){

}







}