<?php

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