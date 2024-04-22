<?php


if(isset($_POST['enviar'])){
    $num = $_POST['num1'];//VARIABLE DEL PRIMER NUMERO
    $num1 = $_POST['num2'];//VARIABLE DEL SEGUNDO NUMERO
    $operador = $_POST['operador'];//VARIABLE DEL OPERADOR
    $status=true;

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
        echo "<a href='index.php'><----VOLVER</a>";
    }else{//SI STATUS ES FALSE SE IMPRIMIRA POR PANTALLA LA ARRAY CON LOS ERRORES RECOGIDOS
        /* for ($i = 0; $i <= count($error_message)-1; $i++) {
            echo "<p>$error_message[$i]</p>";
        } */
        echo "<p>holaa</p>";
        
    }
}else{
    echo "<form action='' method='post'>
<input type='text' value='' name='num1'>
<input type='text' value='' name='num2'>
<p><input type='radio' value='+' name='operador' checked>+</p>
<p><input type='radio' value='-' name='operador'>-</p>
<p><input type='radio' value='*' name='operador'>*</p>
<p><input type='radio' value='/' name='operador'>/</p>
<input type='submit' value='enviar' name='enviar'>
</form>";   
}


//MÉTODOS COMPROBAR
function comprobarNum($num){
    
    if(isset($num) && is_numeric($num)){
        return true;
    }else{
        return false;
    }
    
}

function comprobarOperador($operador){
    $status=false;
    $listaOperadores = array("+","-","/","*");

    for ($i = 0; $i <= count($listaOperadores)-1; $i++) {
        if(strcmp($listaOperadores[$i],$operador)==0){
            $status = true;
        }
    }

    if($status==false){
        mostrarError(0);
    }
    return $status;
}

//MÉTODO MOSTRAR ERRORES
function mostrarError($cod_error){

    $errores[]="El operador no corresponde con ninguno adecuado.";
    $errores[]="El caracter introducido no es un numero o esta vacio.";

    if($cod_error < count($errores) && $cod_error>=0){
        return $errores[$cod_error];
    }
}

//MÉTODO PARA CALCULAR
function calcular($num,$num1,$operador){
    switch($operador){
        case "+":
            return $num + $num1;
            break;
        case "-":
            return $num - $num1;
            break;
        case "/":
            return $num / $num1;
            break;
        case "*":
            return  $num * $num1;
            break;
    }   
}

//MÉTODO MOSTRAR TEXTO
function mostrarTexto($texto){
    echo "<h1> $texto </h1>";
}


?>