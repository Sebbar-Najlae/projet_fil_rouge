<?php
require_once '../manager/emailsManager.php';


$deleteemailManager = null;
$deleteemailManager =  new emailsManager(); 
$deleteemailQuery = $deleteemailManager->delete($_POST["id"]);
?>