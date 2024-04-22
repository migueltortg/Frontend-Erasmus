<?php 
    setcookie("fecha_ult",date("d/m/y.G:i:s"));
    setcookie("contandor",$_COOKIE["contandor"]+1);
    var_dump($_COOKIE["fecha_ult"]);
    var_dump($_COOKIE["contandor"])
?>