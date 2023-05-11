<?php

require '../vendor/autoload.php';
    

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Mailsender 
    {

        public object $phpmailer;

        public function __construct()
        {
            try{
                // Configuración inicial de nuestro servidor de correos
                $this->phpmailer = new PHPMailer();
                $this->phpmailer->isSMTP();
                $this->phpmailer->Host = 'smtp.gmail.com';
                $this->phpmailer->SMTPAuth = true;
                $this->phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $this->phpmailer->CharSet = PHPMailer::CHARSET_UTF8;
                $this->phpmailer->Port = 465;
                $this->phpmailer->Username = 'kevinsaavedra55@gmail.com';
                $this->phpmailer->Password = 'mvmsmhhrjqsnecno';    
    
            } catch(Exception $e){
                echo 'Mensaje '.$this->phpmailer->ErrorInfo;
            }
        }


        public function setDestination(string $destination, string $name, string $subject, string $body, bool $html=false)
        {
            // Añadiendo destinatarios
            $this->phpmailer->setFrom('hospitalRF@facebook.com', 'Hospital Rafael Rangel');
            $this->phpmailer->addAddress( $destination, $name );     

            // Definiendo el contenido de mi email
            $this->phpmailer->isHTML($html);                                  //Set email format to HTML
            $this->phpmailer->Subject = $subject;
            $this->phpmailer->Body    = $body;
        }

        public function send()
        {
            try {
                $this->phpmailer->send();
            } catch (Exception $e) {
                return $e;
            }
            
        }
    }

    $mail = new Mailsender;
    $mail->setDestination('kevinsaavedra00@gmail.com', 'kevin', 'asunto', 'contenido', 'html');
    $mail->send();

?>