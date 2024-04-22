<?php

include "funciones.php";

$num = $_GET['num'];//VARIABLE DEL PRIMER NUMERO
$num1 = $_GET['num1'];//VARIABLE DEL SEGUNDO NUMERO
$operador = $_GET['operador'];//VARIABLE DEL OPERADOR
$resultado =0;//VARIABLE DEL RESULTADO
$status=true;

if($_SERVER['REQUEST_METHOD']=='GET'){

    //SE COMPRUEBA SI EL NUMERO ES CORRECTO,SINO ES CORRECTO STATUS PASA A SER FALSE,NO SE HARA LA OPERACION Y SE AÑADE EL ERROR A LA ARRAY
    if(!comprobarNum($num)){
        $error_message[]=mostrarError(1);
        $status=false;
    }

    //SE COMPRUEBA SI EL NUMERO ES CORRECTO,SINO ES CORRECTO STATUS PASA A SER FALSE,NO SE HARA LA OPERACION Y SE AÑADE EL ERROR A LA ARRAY
    if(!comprobarNum($num1)){
        $error_message[]=mostrarError(1);
        $status=false;
    }

    //SE COMPRUEBA SI EL OPERADOR ES CORRECTO,SINO ES CORRECTO STATUS PASA A SER FALSE,NO SE HARA LA OPERACION Y SE AÑADE EL ERROR A LA ARRAY
    if(!comprobarOperador($operador)){
        $error_message[]=mostrarError(0);
        $status=false;
    }

    if($status==true){//SI STATUS ES CORRECTO SE SEGUIRA ADELANTE
        $resultado = calcular($num,$num1,$operador);//SE HACE EL CALCULO
        mostrarTexto($resultado);//SE MUESTRA EL RESULTADO
    }else{//SI STATUS ES FALSE SE IMPRIMIRA POR PANTALLA LA ARRAY CON LOS ERRORES RECOGIDOS
        for ($i = 0; $i <= count($error_message)-1; $i++) {
            echo "<p>$error_message[$i]</p>";
        }
    }
    
}

?>