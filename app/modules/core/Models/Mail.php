
<?php

/**
* Modelo del modulo Core que se encarga de inicializar  la clase de envio de correos
*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Core_Model_Mail
{
    /**
     * classe de  phpmailer
     * @var class
     */
    private $mail;

    /**
     * asigna los valores a la clase e instancia el phpMailer
     */
    public function __construct()
    {
        
        /*
        $this->mail = new PHPMailer(true);
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 4;
        $this->mail->SMTPSecure = "tls";
        $this->mail->Host = "localhost";
        $this->mail->Port = 587;
        $this->mail->SMTPAuth = true;
        $this->mail->Username ="notificaciones@naxxpizza.com";
        $this->mail->Password ="Admin.2008";
        $this->mail->SetFrom("notificaciones@naxxpizza.com","Notificaciones Naxx Pizza");
        $this->mail->AddReplyTo("notificaciones@naxxpizza.com","Notificaciones Naxx Pizza");
        */
       
        /*
        $this->mail = new PHPMailer;
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPSecure = "tls";
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 587;
        $this->mail->SMTPAuth = true;
        $this->mail->Username ="notificaciones.naxxpizza@gmail.com";
        $this->mail->Password ="Admin.2008";
        $this->mail->SetFrom("notificaciones.naxxpizza@gmail.com","Notificaciones Naxx Pizza");
        */
        
        $this->mail = new PHPMailer;
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->SMTPSecure = "ssl";
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 465;
        $this->mail->SMTPAuth = true;
        $this->mail->Username ="soportecafelibro@gmail.com";
        $this->mail->Password ="dhzrhpxkisggfuum";
        $this->mail->SetFrom("soportecafelibro@gmail.com","Notificaciones GaleriaCafeLibro");
        


        // $this->mail = new PHPMailer;
        // $this->mail->CharSet = 'UTF-8';
        // $this->mail->isSMTP();
        // $this->mail->SMTPDebug = 0;
        // $this->mail->SMTPSecure = "tls";
        // $this->mail->Host = "naxxpizza.com";
        // $this->mail->Port = 587;
        // $this->mail->SMTPAuth = true;
        // $this->mail->Username ="pedidosonline@naxxpizza.com";
        // $this->mail->Password ="Naxx2022.";
        // $this->mail->SetFrom("pedidosonline@naxxpizza.com","Notificaciones Naxx Pizza");


    }
    /**
     * retorna la  instancia de email
     * @return class email
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * envia el correo
     * @return bool envia el estado del correo
     */
    public function sed()
    {
        if ($this->mail->send()) {
            return true;
        } else {
            return false;
        }
    }
}