<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "../database/database.php";
include "../database/mailsettings.php";
include "../database/subscribers.php";

$database = new database();
$db = $database->connect();
$subscribers = new subscribers($db);
$stmt_subscribers = $subscribers->readSendMail();

$mailsettings = new mailsettings($db);
$mailsettings->id = 1;
$mailsettings->read();

//Load Composer's autoloader
require 'vendor/autoload.php';

$title = $_POST['title'];
$content = $_POST['content'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $mailsettings->mail_server;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $mailsettings->mail_username;                     //SMTP username
    $mail->Password   = $mailsettings->mail_password;                               //SMTP password
    $mail->Port       = $mailsettings->mail_port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($mailsettings->email, 'Support');
    if ($stmt_subscribers->rowCount() > 0) {
        while ($rows = $stmt_subscribers->fetch()) {
            $mail->addAddress($rows['email']);
        }


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body    = $content;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if ($mail->send()) {
            echo "success";
        }
    } else {
        echo "no User";
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
