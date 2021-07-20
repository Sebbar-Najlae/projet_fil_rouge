<?php
require_once '../manager/emailsManager.php';

        $emailsManager = null;
        $getemailsManager = new emailsManager();    
        $getemails = $getemailsManager->getList();
        print_r(json_encode($getemails));
?>