<?php
//echo "{mensaje:España va bien}";
use PHPMailer\PHPMailer\PHPMailer;
//incluimos la clase PHPMailer
require_once('vendor/autoload.php');

//instancio un objeto de la clase PHPMailer
$mail = new PHPMailer(); // defaults to using php "mail()"
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';  //gmail SMTP server
$mail->SMTPAuth = true;
$mail->SMTPDebug = 1;
$mail->Host = 'smtp.gmail.com';  //gmail SMTP server
$mail->Username = 'migueltortg@gmail.com';   //email
$mail->Password = "";   //16 character obtained from app password created
$mail->Port = 465;                    //SMTP port
$mail->SMTPSecure = "ssl";

//defino el cuerpo del mensaje en una variable $body
//se trae el contenido de un archivo de texto
//también podríamos hacer $body="contenido...";
$body = "<H1>España va bien</H1>";
//Esta línea la he tenido que comentar
//porque si la pongo me deja el $body vacío
// $body = preg_replace('/[]/i','',$body);

//defino el email y nombre del remitente del mensaje
$mail->SetFrom('xxxx@gmail.com', 'Maestro armero');

$address = "jve@ieslasfuentezuelas.com";
//la añado a la clase, indicando el nombre de la persona destinatario
$mail->AddAddress($address, "Maestro");

//Añado un asunto al mensaje
$mail->Subject = "Prueba de contenedores";

//Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
$mail->AltBody = "Ójala salga";

//inserto el texto del mensaje en formato HTML
$mail->MsgHTML($body);

//asigno un archivo adjunto al mensaje
//$mail->AddAttachment("ruta/archivo_adjunto.gif");

//envío el mensaje, comprobando si se envió correctamente
if(!$mail->Send()) {
  echo "Error al enviar el mensaje: " . $mail->ErrorInfo;
} else {
  echo "Mensaje enviado!!";
}
?>
