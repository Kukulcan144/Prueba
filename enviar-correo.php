<?php

$nombre = $POST["nombre"];
$correo = $POST["correo"];
$telefono = $POST["telefono"];
$mensaje = $POST["mensaje"];

$body = ("Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Telefono: " . $telefono . "<br>Mensaje: " . $mensaje);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'kukulcan144@gmail.com';                     // SMTP username
    $mail->Password   = 'VOLVERALFUTURO144';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('kukulcan144@gmail.com', '$nombre');//quien lo envia
    $mail->addAddress('kukulcan144@gmail.com');     // Add a recipient -aqui a quien se le envia
   

    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $correo;
    $mail->Body    = $body;
    
    $mail->ChaSet = 'UTF-8';
    $mail->send();
    echo '<script>
    alert("El mensaje se envio correctamente");
    window.history.go(-1);
    </script>';
} catch (Exception $e) {
    echo "hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}
?>