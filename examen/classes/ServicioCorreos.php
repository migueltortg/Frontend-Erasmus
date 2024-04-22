<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require "vendor/autoload.php";

class ServicioCorreos
{
    // Properties
    private $asunto;
    private $descripcion;

    // Constructor
    public function __construct($asunto = "asunto", $descripcion = "descripción") {
        $this->asunto = $asunto;
        $this->descripcion = $descripcion;
    }


    function enviar() {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        // cambiar a 0 para no ver mensajes de error
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "tls";
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 587;
        // introducir usuario de google
        $mail->Username   = "pcroper1909@g.educaand.es";
        // introducir clave
        $mail->Password   = "cdwptpqcxbqkium";
        $mail->SetFrom('pcroper1909@g.educaand.es', 'Prueba');
        // asunto
        $mail->Subject    = $this->asunto;
        // cuerpo
        $mail->MsgHTML($this->descripcion);
        // destinatario
        $address = "pcroper1909@g.educaand.es";
        $mail->AddAddress($address, "Yo");
        // enviar
        $resul = $mail->Send();
        if(!$resul) {
        echo "Error" . $mail->ErrorInfo;
        } else {
        echo "Enviado";
        }
    }
}

?>