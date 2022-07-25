<?php

namespace App\Http\Apis;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class MailerApi
{

    /**
     * @param array|null $customVars Custom vars from router
     * @return string return data to front app
     */
    public function index(?array $customVars): string
    {

        $nombre = $_POST['name'];
        $lasname = $_POST['lasname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $specialty = $_POST['specialty'];

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'g2mcol.co';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'soportecol@g2mcol.co';                     //SMTP username
            $mail->Password   = '';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('soportecol@g2mcol.co', 'Web Southeast');
            $mail->addAddress('soportecol@g2mcol.co', 'Joe User');     //Add a recipient
                       //Name is optional



            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Mensaje de '.$nombre;
            $mail->Body    = 'La persona '.$nombre.' '.$lasname. ' se quiere contactar con tigo desde la pagina de southeast correo '.$email.' numero '.$phone.' mensaje '.$specialty;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return "<script>alert('Mensaje enviado'); location.href = '/'</script>";
        } catch (Exception $e) {
            return "<script>alert('El mensaje no se puede enviar'); location.href = '/'</script>";

        }
    }
}