<?php   
    use PHPMailer\PHPMailer\PHPMailer;
    require "vendor/autoload.php";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    // cambiar a 0 para no ver mensajes de error
    $mail->SMTPDebug  = 2;                          
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";                 
    $mail->Host       = "smtp.gmail.com";    
    $mail->Port       = 587;           

    $mail->Username   = "migueltortg@gmail.com"; //USUARIO QUE ENVIA

    $mail->Password   = "jggi xrpz fezl uwxm";    //CLAVE 
    $mail->SetFrom('maestroarmero@ieslasfuentezuelas.com', 'Test');
    
    $mail->Subject    = "Sargento Arensibia";//ASUNTO

    $mail->MsgHTML('Prueba');//TEXTO
    
    $address = "migueltortg@gmail.com";// destinatario
    $mail->AddAddress($address, "Test");
    
    // enviar
    $resul = $mail->Send();
    if(!$resul) {
      echo "Error" . $mail->ErrorInfo;
    } else {
      echo "Enviado";
    }

?>