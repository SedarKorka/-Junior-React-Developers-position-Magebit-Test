<?php 
require_once ('config/config.php');
require_once ('config/db.php');
require_once ('functions/functions.php');
require_once ('classes/Email.php');


global $con;

$errors = [];
extract($_POST);
extract($_GET);

if (isset($id)) {
    Email::delete_email($id);
    header("Location:".LINK."list");
}else{
    header("Location:".LINK."list");
}



?>