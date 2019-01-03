<?php 
use phpmailer\PHPMailer\PHPMailer;
use phpmailer\PHPMailer\Exception;
use phpmailer\PHPMailer\SMTP;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/Exception.php';
require 'phpmailer/SMTP.php';
/**
 * Method that sends the mails
 */

class SendMail
{
    private $_mail;
    private $_name;
    private $_email;
    private $_subject;
    private $_message;
    private $_response = ["sent"=>true];
    const MY_MAIL = 'bageorge123@hotmail.com';
    
    /**
     * @name    name of the mail sender
     * @email   email of user
     * @subject mail subject
     * @message actual message
     */
    public function __construct($name, $email, $subject, $message ) 
    {
        
        $this->_name = $name;
        $this->_email = $email;
        $this->_subject = $subject;
        $this->_message = $message;
        $this->_mail = new PHPMailer();                          // Passing `true` enables exceptions
        try {
            //Server settings
            // $this->mail->SMTPDebug = 2;
            $this->_mail->isSMTP();                              // Set mailer to use SMTP
            $this->_mail->Host = 'smtp.gmail.com';               // Specify main and backup SMTP servers
            $this->_mail->SMTPAuth = true;                       // Enable SMTP authentication
            $this->_mail->Username = 'bageorge123@gmail.com';    // SMTP username
            $this->_mail->Password = 'pagkaki123!@';             // SMTP password
            $this->_mail->SMTPSecure = 'tls';                    // Enable TLS encryption, `ssl` also accepted
            $this->_mail->Port = 587;                            // TCP port to connect to

            //Recipients
            $this->_mail->setFrom($this->_email, $this->_name);
            $this->_mail->addAddress(self::MY_MAIL, 'Me');       // Add a recipient
            
            //Content
            $this->_mail->isHTML(true);                          // Set email format to HTML
            $this->_mail->Subject = $this->_subject;
            $this->_mail->Body    = $this->_message;
            $this->_mail->send();
            $this->_response["message"] = "Message has been sent";
            $this->_response = json_encode($this->_response);
            echo $this->_response;
        } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $this->_mail->ErrorInfo;
        }
     
    }    
}



$values = ['name','email','subject','message'];
foreach ($_POST as $key => $value) {
    if ($value != "") {
        ${$key} = $value;
    }
}
$notConfirmed = ["notConfirmed"=>false];
foreach ($values as $value) {
    if (!isset(${$value})) {
        $notConfirmed['notConfirmed'] = true;
        $notConfirmed[] = $value;
    }
}

if ($notConfirmed['notConfirmed']) {
    $notConfirmed = json_encode($notConfirmed);
    echo $notConfirmed;
    exit();
} else {
    $mail = new SendMail($name, $email, $subject, $message);
}

?>