<?php
    require_once "DB.php";
    $db = new DB();
    $db->conectar();
    $conexion = $db->getConexion();

    function pintaPantalla(){
        echo "
        <h1>Votacion</h1>
        <form action='' method='get id='voto'>
            <p><input type='radio' name='votacion' value='PHP'>PHP</p>
            <p><input type='radio' name='votacion' value='JS'>JS</p>
            <p><input type='radio' name='votacion' value='Ninguno'>Ninguno</p>
            <input type='submit' name='submit'>
        </form>";
    };

    if(isset($_GET["submit"])){
        $preparedConexion=$conexion->prepare("INSERT INTO votos (nombreVoto) VALUES (:voto)"); 
        $preparedConexion->bindParam(':voto', $_GET["votacion"]);
        $preparedConexion->execute();
    
    }else{
        pintaPantalla();
    }
?>