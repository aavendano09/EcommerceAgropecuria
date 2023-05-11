<?php

include 'Mailsender.php';

$correo = $_POST['email_m'];

    $mail = new Mailsender;
    $mail->setDestination('feragricultorca2018@gmail.com', 'kevin', 'asunto', 'contenido', 'html');
    $mail->send();
