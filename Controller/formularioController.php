<?php

namespace Controller;

require_once('src/Exception.php');
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class FormularioController{

    public function mostrarFormulario(){

        if( !empty($_POST['mail']) and !empty($_POST['nombre']) and !empty($_POST['comentario']) ){
            $email = $_POST['mail'];
            $nombre = $_POST['nombre'];
            $comentario = $_POST['comentario'];

            $mail = new PHPMailer(true);

            try{
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->Username = 'tatoguerra475@gmail.com';
                $mail->Password = 'gmazcndkyipzffpt';

                $mail->CharSet = 'UTF-8';

                $mail->setFrom('tatoguerra475@gmail.com','Sender Name');
                $mail->addAddress('tatoguerra475@gmail.com','Receiver Name');

                $mail->isHTML(true);
                $mail->Subject = 'Asunto del mensaje';

                $mail->Body = "<h3>Recibiste un mensaje de: {$nombre}</h3><br><p>El correo del usuario es: {$email}</p><br><p>El mensaje es: {$comentario}</p>";

                $mail->send();

                echo"Correo Enviado";

            }catch(Exception $e){
                echo "Hubo un error al enviar el mensaje: {$mail->$e}";
            }

            echo"<div class='alert alert-dark' role='alert'>
            Email:<strong> {$email} </strong> <br> Nombre: {$nombre} <br> Comentario: {$comentario}
            </div>";

        } else {
            echo"<div class='alert alert-danger' role='alert'>
            Debe completar todos los campos
            </div>";
        }
    }
}

?>