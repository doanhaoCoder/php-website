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

$code = uniqid('verify_'); //Khai báo chuỗi verify ngẫu nhiên

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


//Server settings
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = $mailsettings->mail_server;             //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = $mailsettings->mail_username;           //SMTP username
$mail->Password   = $mailsettings->mail_password;           //SMTP password
$mail->Port       = $mailsettings->mail_port;               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom($mailsettings->email, 'Support');

if (!empty($_POST['email'])) {
    $subscribers = new subscribers($db);
    $subscribers->email = $_POST['email'];
    $stmt = $subscribers->checkRequestSubscriber();

    /*Resend verify code if user already has been created!*/
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch();
        if ($row['verified_token'] == 'verified') {
            echo "already_suscriber";
        } else {
            $db_code = $row['verified_token'];
            $title = 'Resend confirmation for create Blogs account!';
            $content = '<h5>Welcome ' . $_POST['email'] . '</h5>
                       <p>Thank you for signing up Blogs.</p>
                       <p>Verify your email address by clicking this link below.</p>
                       <a href="http://localhost/dhao/index.php?verify=' . $db_code . '">Confirm my account</a>
                       <p>Note that unverified accounts are automatically deleted 30 days after sign up.</p>
                       <p>If you didn\'t request this, please ignore this email.</p>';

            try {
                $mail->addAddress($_POST['email']);
                $mail->isHTML(true);
                $mail->Subject = $title;
                $mail->Body    = $content;
                $mail->send();
                echo "resend_mail";
            } catch (Exception $e) {
                echo "Message could not be resent. Mailer Error: " . $e->getMessage();
            }
        }
    }
    /*Create new verify code for new subscriber*/ else {
        $subscribers->email = $_POST['email'];
        $subscribers->verified_token = $code;
        $subscribers->status = 0;

        $subscribers->created_at = date('Y-m-d h:i:s', time());
        $subscribers->updated_at = date('Y-m-d h:i:s', time());
        $subscribers->create();

        $title = 'Confirmation for create Blogs account!';
        $content = '<h5>Welcome ' . $_POST['email'] . '</h5>
                   <p>Thank you for signing up Blogs.</p>
                   <p>Verify your email address by clicking this link below.</p>
                   <a href="http://localhost/dhao/index.php?verify=' . $code . '">Confirm my account</a>
                   <p>Note that unverified accounts are automatically deleted 30 days after sign up.</p>
                   <p>If you didn\'t request this, please ignore this email.</p>';
        try {
            $mail->addAddress($_POST['email']);
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body    = $content;
            $mail->send();
            echo "success";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: " . $e->getMessage();
        }
    }
} else {
    echo "false";
}
