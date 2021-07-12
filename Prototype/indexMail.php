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
// link to table
$req= "SELECT * FROM recipient";

// fetch email
$result = $dbh->prepare($req);
$result->execute();
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $email = $row["email"];
    $subject = $row["subject"];
    $body = $row["body"];

}
        
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
$mail->Password ="";
// set email subject
$mail->Subject=$subject;
// set sender email
$mail->setFrom("no-reply@gmail.com");
// Email body
$mail->Body = $body;
// add recipient
$mail->addAddress($email);
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