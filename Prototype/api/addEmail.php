<?php
require_once '../manager/emailsManager.php';

$email = new Email();
$email->setEmail($_POST["email"]);
$email->setSubject($_POST["subject"]);
$email->setBody($_POST["body"]);
$email->setDate($_POST["dateSend"]);

$addemailManager = null;
$addemailManager =  new emailsManager(); 
$addemailQuery = $addemailManager->add($email);

?>