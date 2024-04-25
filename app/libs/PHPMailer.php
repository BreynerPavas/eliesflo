<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "../vendor/phpmailer/phpmailer/src/Exception.php";
require "../vendor/phpmailer/phpmailer/src/PHPMailer.php";
require "../vendor/phpmailer/phpmailer/src/SMTP.php";



function enviarToken($email,$token)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;

        FILTER_VALIDATE_EMAIL;
        $mail->Username = "wubbabactan@gmail.com";
        $mail->Password = "lmhkozuniahhytkm";

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = "465";

        $mail->setFrom("wubbabactan@gmail.com");
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->CharSet = "UTF8";
        $mail->Subject = "VALIDACIÓN CUENTA";
        $mail->Body = "Pincha en el link, que no te vamos a hackear ni nada bro ;) \n
                    <a href='http://localhost/wuba/WuBa/web/index.php?ctl=wuRellenar&token=$token'>Laura33 te quiere conocer</a>"; //CAMBIAR CUANDO DESPLEGUEMOS EL SERVIDOR
        $mail->send();
    } catch (Exception $e) {
        echo "Algo no va bien {$mail->ErrorInfo}";
    }

}

function enviarCambioPwd($email,$token){
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;

        FILTER_VALIDATE_EMAIL;
        $mail->Username = "wubbabactan@gmail.com";
        $mail->Password = "lmhkozuniahhytkm";

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = "465";

        $mail->setFrom("wubbabactan@gmail.com");
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->CharSet = "UTF8";
        $mail->Subject = "VALIDACIÓN CUENTA";
        $mail->Body = "Pincha en el link, que no te vamos a hackear ni nada bro ;) \n
                    <a href='http://localhost/wuba/WuBa/web/index.php?ctl=wuCambiarPwd&token=$token'>No recuerdo para que era este correo...</a>"; //CAMBIAR CUANDO DESPLEGUEMOS EL SERVIDOR
        $mail->send();
    } catch (Exception $e) {
        echo "Algo no va bien {$mail->ErrorInfo}";
    }

}
?>