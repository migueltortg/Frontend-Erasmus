<?php 
    class DB {
        private static $conexion=null;
        
        public static function getConexion(){
            if(self::$conexion==null){
                $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                self::$conexion=new PDO('mysql:host=datos;dbname=nombreDB', 'root', '',$opciones);
            }
            return self::$conexion;
        }

        public static function desconectar(){
            self::$conexion=null;
        }
    }
?>
<!-- public static function item_convocatoria($conexion,$idConvocatoria){
            $resultado = $conexion->query("SELECT *
            FROM CONVOCATORIA_ITEM
            JOIN ITEM_BAREMABLE ON CONVOCATORIA_ITEM.ID_ITEM = ITEM_BAREMABLE.ID_ITEM_BAREMABLE
            WHERE CONVOCATORIA_ITEM.ID_CONVOCATORIA = '".$idConvocatoria."';"
            , MYSQLI_USE_RESULT);
            
            $arrayItem=array();
            while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                array_push($arrayItem,$registro);
            } 
            return $arrayItem;
        } -->