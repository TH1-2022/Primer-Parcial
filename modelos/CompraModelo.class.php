<?php 
    require $_SERVER['DOCUMENT_ROOT'] . "/utils/autoload.php";

    class CompraModelo extends conexionModelo{
        public $IdPersona;
        public $IdProducto;
        public $FechaYHora;
        public $Nombre;
        public $Descripcion;

        public function __construct(){
            parent::__construct();
        }

        public function Insertar(){
            $sql = "INSERT INTO compra (id_persona, id_producto) VALUES (
                " . $this -> IdPersona . ",
                " . $this -> IdProducto . ")";
            $this -> conexionBaseDeDatos -> query($sql);
            echo "Para regresar al menu presione <a href='/index.php'>Volver</a>";
        }

        public function EliminarPersona($idpersona){
            $sql = "DELETE FROM compra WHERE id_persona = " . $idpersona;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function EliminarProducto($idproducto){
            $sql = "DELETE FROM compra WHERE id_producto = " . $idproducto;
            $this -> conexionBaseDeDatos -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "SELECT compra.id_persona, compra.id_producto, producto.nombre, producto.descripcion, compra.fecha_hora
                    FROM compra JOIN persona ON compra.id_persona = persona.id 
                    JOIN producto ON compra.id_producto = producto.id
                    GROUP BY compra.fecha_hora";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $c = new CompraModelo;
                $c -> IdPersona = $fila['id_persona'];
                $c -> IdProducto = $fila['id_producto'];
                $c -> FechaYHora = $fila['fecha_hora'];
                $c -> Nombre = $fila['nombre'];
                $c -> Descripcion = $fila['descripcion'];
                array_push($resultado,$c);
            }
            return $resultado;
        }

    }