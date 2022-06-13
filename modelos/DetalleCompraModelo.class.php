<?php 

require "../../utils/autoload.php";

    class DetalleCompraModelo extends Modelo{
        public $IdPersona;
        public $IdProducto;
        public $FechaYHora;
        public $NombrePersona;
        public $ApellidoPersona;
        public $TelefonoPersona;
        public $Email_persona;
        public $NombreProducto;
        public $DescripcionProducto;
        public $StockProducto;

        public function __construct(){
            parent::__construct();
        }

        public function ObtenerTodos(){
            $sql = "SELECT com.id_persona, com.id_producto, com.fecha_hora, 
            per.nombre nombre_persona, per.apellido apellido_persona, per.telefono telefono_persona, per.email email_persona, 
            prod.nombre nombre_producto, prod.descripcion descripcion_producto, prod.stock stock_producto FROM 
            compra com, persona per, producto prod WHERE 
            com.id_persona = per.id AND 
            com.id_producto = prod.id 
            ORDER BY com.fecha_hora DESC";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $compra = new DetalleCompraModelo();
                $compra -> IdPersona = $fila['id_persona'];
                $compra -> IdProducto = $fila['id_producto'];
                $compra -> FechaYHora = $fila['fecha_hora'];
                $compra -> NombrePersona = $fila['nombre_persona'];
                $compra -> ApellidoPersona = $fila['apellido_persona'];
                $compra -> TelefonoPersona = $fila['telefono_persona'];
                $compra -> EmailPersona = $fila['email_persona'];
                $compra -> NombreProducto = $fila['nombre_producto'];
                $compra -> DescripcionProducto = $fila['descripcion_producto'];
                $compra -> StockProducto = $fila['stock_producto'];
                array_push($resultado,$compra);
            }
            return $resultado;

        }

    }