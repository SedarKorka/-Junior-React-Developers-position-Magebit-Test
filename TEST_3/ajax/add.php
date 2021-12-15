<?php
 
require_once ('../config/config.php');
require_once ('../config/db.php');
require_once ('../functions/functions.php');
require_once ('../classes/Email.php');


global $con;

$errors = [];
extract($_POST);



    $emailexiste = Email::selectByEmail($emailD);
     if (count($emailexiste) > 0) {
        echo "emailexit";
     } else {
        
        Email::add_email($emailD);
        echo "success";
     }
     
   

