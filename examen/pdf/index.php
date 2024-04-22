<?php

require 'vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Generar el PDF
$html = '<html><body><h1>'.$_POST["cuerpo"].'</h1></body></html>';
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$output = $dompdf->output();

// Ruta local en el contenedor "pdf"
$file_path = '/pdfs/mipdf.pdf';

// Guardar el PDF en el directorio local
file_put_contents($file_path, $output);
echo $output;

?>


<?php

// require_once 'vendor/autoload.php';
// use Dompdf\Dompdf;

// $html = '
// <html>
// <head>
// <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
// <title>Pedazo de PDF</title>
// </head>
// <body>

// <h2>Ingredientes para aprobar DWES</h2>
// <p>Ingredientes:</p>
// <dl>
// <dd>Perseverancia</dd>
// <dd>Constancia</dd>
// <dd>Optimismo</dd>
// <dd>Autoestima</dd>
// <dd>Trabajo en Equipo</dd>
// <dd>Jamón Pata Negra</dd>
// <dd><img src="jamon.jpg" alt="jamón pata negra"></dd>
// </dl>
// </body>
// </html>';

// $mipdf = new Dompdf();
// $mipdf->getOptions()->setChroot($_SERVER["DOCUMENT_ROOT"].'\docker\jamon');
// # Definimos el tamaño y orientación del papel que queremos.
// # O por defecto cogerá el que está en el fichero de configuración.
// $mipdf->setpaper("A4", "portrait");
// # Cargamos el contenido HTML.
// $mipdf->loadhtml($html);

// # Renderizamos el documento PDF.
// $mipdf->render();

// # Creamos un fichero
// $pdf = $mipdf->output();
// $filename = "HeavenTicket.pdf";
// file_put_contents($filename, $pdf);

// # Enviamos el fichero PDF al navegador.
// $mipdf->stream($filename,["Attachment" => false]);

?>