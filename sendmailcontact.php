<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "admin/database/database.php";
include "admin/database/mailsettings.php";
include "admin/database/subscribers.php";

$database = new database();
$db = $database->connect();

$mailsettings = new mailsettings($db);
$mailsettings->id = 1;
$mailsettings->read();

//Load Composer's autoloader
require 'admin/mail/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


//Server settings
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = $mailsettings->mail_server;             //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = $mailsettings->mail_username;           //SMTP username
$mail->Password   = $mailsettings->mail_password;           //SMTP password
$mail->Port       = $mailsettings->mail_port;               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
$mail->CharSet    = 'utf-8';

//Recipients
$mail->setFrom($mailsettings->email, 'Support');

if(!empty($_POST['email'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $title = "Mail contact from visitor";
    $content = $_POST['message'];
    
    try{
        $mail->setFrom($email, $name);
        $mail->addAddress($mailsettings->email);
        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body = $content;
        $mail->send();
        echo "success";
    }catch(Exception $e){
        echo "Message could not be sent. Mailer error: ".$e->getMessage();
    }

}

   
    
