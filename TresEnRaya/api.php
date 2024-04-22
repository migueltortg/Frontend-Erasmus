<?php
//API para juego 3 en rayas
//api.php?accion=???&sala=???&jugador=???
//        accion=inicializar
//        jugador="X"|"0"
//        inicializa el juego, si el array estÃ¡ relleno lo vacia, 
//        borra los jugadores y establece a jugador1 a lo introducido y si jugador2
//        esta relleno lo borra y turno "" esperando al jugador 2
//        si el array estÃ¡ vacio y jugador1 relleno y jugador2 vacio lo rellena y 
//        establece el turno a jugador1
//        devuelve el tablero y establece turno a jugador1
//        si jugador 1 estÃ¡ relleno y jugador2 es igual a jugador1 generar un error 

    $path="./salas/";
    $respuesta = new stdClass();
    if (isset($_GET["sala"])){
        $sala=$_GET["sala"];
    }else{
        $respuesta->error=true;
        $respuesta->mensaje="Debe de indicar una sala";
        echo json_encode($respuesta);
        exit;
    }
    if (isset($_GET["accion"]) && $_GET["accion"]=="inicializar" &&
        isset($_GET["sala"]) && isset($_GET["jugador"])){
            $jugador=$_GET["jugador"];
            
            if (file_exists($path.$sala)){
                $obj=json_decode(file_get_contents($path.$sala));
                if ($obj->jugador2==""){
                    $obj->jugador2="0";
                    $respuesta->tujugador="0";
                    $respuesta->esperar=false;
                    $respuesta->turno="X";
                    file_put_contents($path.$sala,json_encode($obj));
                }else{
                    $respuesta->error=true;
                    $respuesta->mensaje="Esa sala ya estÃ¡ completa inicialice una nueva";
                }
            } else {
                $obj = new stdClass();
                $obj->jugador1 = "X";
                $obj->jugador2 = "";
                $obj->turno = "X";
                $obj->movimientos=["","","","","","","","",""];
                file_put_contents($path.$sala,json_encode($obj));
                $respuesta->tujugador="X";
                $respuesta->turno="X";
                $respuesta->esperar=true;
            }


    }else if (isset($_GET["accion"]) && $_GET["accion"]=="leer"){
        if (file_exists($path.$sala)){
            echo file_get_contents($path.$sala);
        }
    } else if (isset($_GET["accion"]) && isset($_GET["jugador"]) && 
               isset($_GET["jugada"]) && $_GET["accion"]=="jugar"){
        $jugador=$_GET["jugador"];
        $jugada=$_GET["jugada"];
        if (file_exists($path.$sala)){
            $obj=json_decode(file_get_contents($path.$sala));
            if ($obj->turno==$jugador){
                $obj->turno=($jugador=="X")?"0":"X";
                $obj->movimientos=$jugada;
                file_put_contents($path.$sala,json_encode($obj));
                $respuesta->error=false;
            } else {
                $respuesta->error=false;
                $respuesta->mensaje="No es tu turno";
            }
        }
    } 
    echo json_encode($respuesta);
?>