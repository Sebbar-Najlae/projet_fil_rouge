<?php
require_once '../manager/emailsManager.php';

$email = new email;
$email->setId($_POST["id"]);
$email->setEmail($_POST["email"]);
$email->setSubject($_POST["subject"]);

$updateemailsManager = null;
$updateemailManager =  new emailsManager(); 
$updateemailQuery = $updateemailManager->update($email);
?>