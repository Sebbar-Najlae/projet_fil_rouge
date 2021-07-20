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
$mail->Password ="";


// set email subject
$subject="select subject from recipient ";
foreach ($dbh->query($subject) as $row) {
$mail->Subject = $row['subject'];
}


// set sender email
$mail->setFrom("no-reply@gmail.com");


// Email body



// $body="select body from recipient ";
// foreach ($dbh->query($body) as $row) {
// $mail->CreateBody($row['body']);}
$mail->Body="var locationOne = '/dashboard/getTrend?period=30d&profileId=119';
var locationTwo = '/dashboard/getTrend?period=30d&profileId=120';
var multipleURL = [locationOne, locationTwo];

$.each(multipleURL, function (i, url) {
    $.ajax(url,
            {
                type: 'POST',
                data: {
                },
                success: function (data) {

                }
            }
    );
});";


// add recipient
$email="select email from recipient ";
foreach ($dbh->query($email) as $row) {
$mail->AddAddress($row['email']);
}
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