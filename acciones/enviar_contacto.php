<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre  = htmlspecialchars($_POST['nombre']);
    $email   = htmlspecialchars($_POST['email']);
    $asunto  = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'iromerofuente@gmail.com';
        $mail->Password   = 'mrnizlucuopdsfpj';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('iromerofuente@gmail.com', 'Burton Factory');
        $mail->addAddress('iromerofuente@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = "Contacto Web: " . $asunto;

        $mail->Body = "
            <h2>Nuevo mensaje desde Burton Factory</h2>
            <p><strong>Nombre:</strong> $nombre</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Mensaje:</strong><br>$mensaje</p>
        ";

        $mail->send();

        header("Location: ../paginas/contacto.php?enviado=ok");
        exit();

    } catch (Exception $e) {
        echo "Error al enviar: {$mail->ErrorInfo}";
    }
}