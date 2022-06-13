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


        public static function Alta(){
            $p = new PersonaModelo();    
            $p -> Nombre = $_POST['nombre'];
            $p -> Apellido = $_POST['apellido'];
            $p -> Telefono = $_POST['telefono'];
            $p -> Email = $_POST['email'];
            $p -> Guardar();
            header("Location: /Primer-Parcial/index.php");
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
