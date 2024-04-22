<?php
$id = $_GET['id'];
$nombre= $_GET['nombre'];


/* $fichero = fopen("fichero.csv","r");
$datos="";

while (($datos = fgetcsv($fichero,14, "\n")) == true)
{
    for ($columna = 0; $columna < count($datos); $columna++){
        echo $datos[$columna] . "<br>";
    }
}
fclose($fichero);


var_dump(fgetcsv($fichero,14, "\n")); */

$rows = array_map('str_getcsv',file('fichero.csv'));
$header = array_shift($rows);
$csv = array();

foreach ($rows as $row){
    $csv[$row[0]] = array_combine($header,$row);
}

var_dump($csv);


/* // Abre el fichero para obtener el contenido existente
$actual = file_get_contents($fichero);
// Añade una nueva persona al fichero
$actual .= "\n$id;$nombre";
var_dump($actual);
// Escribe el contenido al fichero
file_put_contents($fichero, $actual);
$arr=explode("\n",$actual);
foreach($arr as $v)
{
    $asoc[explode(";",$v)[0]] = explode (";",$v)[1];
}
var_dump($asoc); */

//FUNCION PHP PARA TRATAR CSV
//SI EL ID YA EXISTE NO SE CONCATENA



//Formulario ID y Nombre,sin boton de enviar,muchos botones
//delete,modificar y add.

//Si existe ID,ERROR.

//ID NO SE MODIFICA

//ID ---- NOMBRE ---BTN alta
//LISTADO
//ID --- NOMBRE --- BTN delete --- BTN modificar
?>