<?php

require "autoload.php";

class PersonaControlador {


    public static function FormularioAlta(){

    require_once "Vistas/FormularioAltaPersona.php";

    }


    public static function FormularioModificar(){
        $p = new PersonaModelo($_GET['id']);
        require_once "Vistas/FormularioModificarPersona.php";
        }







        public static function Listar(){

            $per = new PersonaModelo();
            $personas = $per -> ObtenerPersonas();
        
            $listadopersonas = array();
        
            foreach($personas as $fila){
        
                $p = array( 
                    'id' => $fila -> id, 
                    'nombre' => $fila -> nombre,
                    'apellido' => $fila -> apellido,
                    'telefono' => $fila -> telefono,
                    'email' => $fila -> email 
                );
               
                array_push($listadopersonas, $p);
            }
        
            return $listadopersonas;


        }


    }
