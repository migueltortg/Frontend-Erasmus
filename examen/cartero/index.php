<?php

use GuzzleHttp\Client;
require_once "vendor/autoload.php";

$client = new Client();
$data = [
    'cuerpo' => $_POST["cuerpo"]
];

$response = $client->request('POST', 'http://pdf', 
[
    'form_params' => $data,
]);

$pdf = $response->getBody();

// Guardar el PDF en el directorio local
file_put_contents('pdfs/mipdf.pdf', $pdf);

// Configurar las cabeceras para la descarga del archivo
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="mipdf.pdf"');


// ############################################################
// ################## ENVIAR CORREO ###########################
// ############################################################
require_once "entities/ServicioCorreos.php";

echo $pdf;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = new ServicioCorreos($_POST["destinatario"], $_POST["asunto"], $_POST["cuerpo"], $pdf);
    $correo->enviar();
} else {
    echo "El método por el que se llama a la api no es 'GET'";
}

?>

<?php

// $host = "datos";
// $database = "fruitdb";
// $username = "root";
// $password = "root";

// try {
//     $cnn = new PDO("mysql:host=datos;","root","root");
//     echo "Connected to the database<hr>";
//     var_dump($cnn);
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

?>

<?php

    // echo "Asunto ==> " . $_POST["asunto"] . "<br>";
    // echo "Cuerpo ==> " . $_POST["cuerpo"];

?>
