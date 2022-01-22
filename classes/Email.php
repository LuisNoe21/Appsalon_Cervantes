<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $nombre;
    public $email;
    public $token;

    public function __construct($nombre, $email, $token)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        // Crear el objeto de email
        $mail = new PHPMailer();

        // Configurar SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'd910a798db45e3';
        $mail->Password = '0909c36e7491be';
        $mail->SMTPSecure = 'tls';
        $mail->Port = '2525';

        // Contenido del email
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress($this->email);
        $mail->Subject = 'Confirma tu cuenta';

        // Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Haz creado tu cuenta en AppSalon, solo debes confirmarla presionando el siguiente enlace </p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta </a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje </p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviamos el email
        $mail->send();
    }

    public function enviarInstrucciones() {
        // Crear el objeto de email
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port= 587;
        $mail->SMTPSecure='tls';
        $mail->SMTPAuth= true;
        $mail->Username= 'luisnoe.rodriguez09@gmail.com';
        $mail->Password= 'pxdfjqxywxirotrg';


        $mail->setFrom('luisnoe.rodriguez09@gmail.com'); //remitente del correo
        $mail->addAddress($this->email); //email al que va dirigido el correo
        $mail->Subject = 'Restablece tu contraseña'; //encabezado del correo


        //SET HTML
        $mail -> isHTML(TRUE);
        $mail -> CharSet = 'UTF-8';
        $contenido = "<html>";

        $contenido .= "<table style='width: 100%;
        min-width: 100%;
        background-color: #eeeeee;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
        border-color: #edeae9; 
        border-radius: 4px;
        border-style: solid;
        border-width: 1px;
        height:100%;
        '>";
        $contenido .= "<center>";
        $contenido .= "<img  style='padding: 0;
        margin: 0;
        display: block;
        margin-bottom:10px;
        margin-top:7px;
        width: 150px;
        height: 40px;
        border: none;
        font-size: 30px;; 'src='https://portafolio.blogluisnoe.com/img/bancodos.png'>";
        $contenido .= "</center>";

       

        $contenido .= "<table style='width: 92%;
        min-width: 85%;
        margin-left:auto;
        margin-right:auto;
        background-color: #ffffff;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
        align:center;
        border-color: #edeae9; 
        border-radius: 4px;
        border-style: solid;
        border-width: 1px;
        '>";
        
        $contenido .= "<p style='position: center; font-weight: 700; font-size:20px; text-align:center'>¡ Hola " .$this->nombre."! </strong>";
        $contenido .= "<p style='text-align:center'>Has solicitado restablecer tu contraseña.</p>";
        $contenido .= "<p style='text-align:center'>Haz clic en el botón que se encuentra abajo para restablecer tu contraseña:</p>";
        $contenido .= "<div style='display:flex; justify-content:center'>";
        $contenido .= " <a  style='color: #267A91;  margin-left:auto; margin-right:auto;' href='http://localhost:3000/recuperar?token= ".$this->token. "'><button
        style=' background-color: #00a3ff;
        padding: 15px 15px;
        color: white;
        margin-left:auto; 
        margin-right:auto;
        margin-top: 5px;
        font-size: 15px;
        font-weight: 900;
        border: none;
        text-align: right;
        text-decoration-line: none;
        width: auto; '>Restablecer Contraseña</button></a>";
        $contenido .= "</div>";
        $contenido .= "</table>";
        
        $contenido .= "<p style='text-align: center;'>Si tu no solicitaste esto, ignora este mensaje.</p>";
        $contenido .= "<hr style='width:60%'>";
        $contenido .= "<p style='text-align: center;display: block;
        font-size: 11px;
        color: #787878;
        line-height: 13px;
        font-family: Arial,sans-serif;'>Copyright © 2022 Banco Atlántida. All rights reserved. Email: luisnoe.rodriguez09@gmail.com</p>";
        $contenido .= "</table>";
        $contenido .= "</html>";

        $mail -> Body = $contenido;
        // Enviamos el email
        $mail->send();
    }
}