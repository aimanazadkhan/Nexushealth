<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
// $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
$mail->isSMTP(); //Send using SMTP
$mail->SMTPAuth = true; //Enable SMTP authentication

$mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
$mail->Username = 'aiman112khan@gmail.com'; //SMTP username
$mail->Password = 'mqeqhkevrhtlhmhl'; //SMTP passworddd

$mail->SMTPSecure = 'ssl'; //Enable implicit TLS encryption
$mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom('from@example.com', 'NEXUSHEALTH');
$mail->addAddress($email); //Add a recipient

//Content
$mail->isHTML(true); //Set email format to HTML
$mail->Subject = 'Email Verfification';
$email_template = "
         <h3>You are receiving this email because you requested for a reset password for your account</h3>
         <h3>If you haven't request for a reset password, please ignore this email or delete it.</h3>
         <br><br>
         <a href='http://localhost/NexusHealth/Authentication/forgotPassChange.php?token=$forgetToken&email=$email'>Click for Resetting your Password</a>
        ";

$mail->Body = $email_template;

$mail->send();
// echo 'Message has been sent';

?>