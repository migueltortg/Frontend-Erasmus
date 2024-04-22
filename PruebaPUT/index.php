<?php 
    $body=file_get_contents("php://input");
    $_PUT=array();
    parse_str($body, $_PUT);
    var_dump($_PUT);
?>