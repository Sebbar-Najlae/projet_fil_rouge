<?php

// Include required phpmailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
// Define name spaces 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// create instance of phpmailer
$mail = new PHPMailer();
// connect to database
$dbh = new PDO("mysql:host=localhost;dbname=remyurda","root","");


        
// Set mailler to use smtp
$mail->isSMTP();
// define smtp host
$mail->Host ="smtp.gmail.com";
// enable smtp authentification
$mail->SMTPAuth ="true";
// set type of encryption (ssl/tls)
$mail->SMTPSecure = "tls";
// set port to connect stmp
$mail->Port="587";
// set gmail username
$mail->Username = "remyurda@gmail.com";
// set gmail password
$mail->Password ="remyurda1234";


// set email subject
$subject="select subject from recipient ";
foreach ($dbh->query($subject) as $row) {
$mail->Subject = $row['subject'];
}
// $mail->Subject = "Mon Vaccin";


// set sender email
$mail->setFrom("no-reply@gmail.com");


// Email body



$body="select body from recipient ";
foreach ($dbh->query($body) as $row) {
$mail->CreateBody($row['body']);}
// $mail->Body="Vous avez un vaccin à faire.";


// add recipient
$email="select email from recipient ";
foreach ($dbh->query($email) as $row) {
$mail->AddAddress($row['email']);
}
// $mail->AddAddress("sebbar.najlae.dev@gmail.com");
// finally send email
if($mail->Send()){
 echo "Email Sent...!";
}
else{
    echo "Error";
}
// closing smtp connection
$mail->smtpClose();
?>