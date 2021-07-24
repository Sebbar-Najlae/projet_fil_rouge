<?php
require_once '../manager/emailsManager.php';

$email = new Email();
$email->setEmail($_POST["addemail"]);
$email->setSubject($_POST["addsubject"]);
$email->setBody($_POST["addbody"]);
$email->setDateSend($_POST["adddateSend"]);

$addemailManager = null;
$addemailManager =  new emailsManager(); 
$addemailQuery = $addemailManager->add($email);

?>