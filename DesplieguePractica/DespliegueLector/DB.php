<?php 
    class DB {
        private $conexion=null;
            
        function conectar(){
            if($this->conexion==null){
                $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                $this->conexion=new PDO('mysql:host=172.17.0.3;dbname=Votacion', 'root', '4321',$opciones);;
            }
        }

        function desconectar(){
            $this->conexion=null;
        }

        function getConexion(){
            return $this->conexion;
        }

        function selectVotos($conexion, $nombre) {
            $query = 'select * from votos where nombreVoto LIKE :nombre;';
            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->execute();
        
            $count = $stmt->rowCount();
        
            return $count;
        }
    }
?>