<?php
    include "DB.php";
	$db = new DB();
    $db->conectar();
    $conexion = $db->getConexion();

    

    echo '
    <h1>Votos PHP '.DB::selectVotos($conexion,"PHP").'</h1>
    <h1>Votos JS '.DB::selectVotos($conexion,"JS").'</h1>';
?>