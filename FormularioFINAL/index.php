<?php 

    //ARRAY CON LOS POSIBLES ERRORES
    $errores = [
        "",
        "El primer operando introducido no es un número o está vacío.",
        "El segundo operando introducido no es un número o está vacío."
    ];

    //ASIGNAMOS QUE NO HAY ERRORES
    $error_num1=$errores[0];
    $error_num=$errores[0];

    //VALOR "" A LAS CAJAS DE TEXTO
    $num="";
    $num1="";

    if(isset($_POST['enviar'])){
        $num = $_POST['num1'];//VARIABLE DEL PRIMER NUMERO
        $num1 = $_POST['num2'];//VARIABLE DEL SEGUNDO NUMERO
        $operador = $_POST['operador'];//VARIABLE DEL OPERADOR
        $status=true;
    
        //SE COMPRUEBA SI EL NUMERO ES CORRECTO,SINO ES CORRECTO STATUS PASA A SER FALSE,NO SE HARA LA OPERACION Y SE AÑADE EL ERROR A LA ARRAY
        if(!comprobarNum($num)){
            $error_num=$errores[1];//SE ASIGNA MENSAJE ERROR A LA VARIABLE
            $num="";//SE ELIMINA EL VALOR DE LA CAJA DE TEXTO
            $status=false;
        }
    
        //SE COMPRUEBA SI EL NUMERO ES CORRECTO,SINO ES CORRECTO STATUS PASA A SER FALSE,NO SE HARA LA OPERACION Y SE AÑADE EL ERROR A LA ARRAY
        if(!comprobarNum($num1)){
            $error_num1=$errores[2];//SE ASIGNA MENSAJE ERROR A LA VARIABLE
            $num1="";//SE ELIMINA EL VALOR DE LA CAJA DE TEXTO
            $status=false;
        }
    
        if($status==true){//SI STATUS ES CORRECTO SE SEGUIRA ADELANTE
            $resultado = calcular($num,$num1,$operador);//SE HACE EL CALCULO
            mostrarTexto($resultado);//SE MUESTRA EL RESULTADO
            echo "<a href='index.php'><----VOLVER</a>";
        }else{
            //AL STATUS ESTAR EN FALSO IMPRIMIMOS FORMULARIO CON LAS VARIBALES DE LOS ERRORES
            imprimirFormulario();
        }
    }else{
        //SI NO SE PULSA ENVIAR SE IMPRIME FORMULARIO
        imprimirFormulario();
    }

    //FUNCION PARA IMPRIMIR FORMULARIO.
    function imprimirFormulario(){
        global $error_num,$error_num1,$num,$num1;

        echo "<form action='' method='post'>
        <input type='text' value='$num' name='num1'>
        <input type='text' value='$num1' name='num2'>
        <br>
        $error_num
        <br>
        $error_num1
        <p><input type='radio' value='+' name='operador' checked>+</p>
        <p><input type='radio' value='-' name='operador'>-</p>
        <p><input type='radio' value='*' name='operador'>*</p>
        <p><input type='radio' value='/' name='operador'>/</p>
        <input type='submit' value='ENVIAR' name='enviar'>
        </form>";   
    }


    //MÉTODOS COMPROBAR
    function comprobarNum($num){
        if(is_numeric($num)){
            return true;
        }else{
            return false;
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