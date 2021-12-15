<?php 
 
 
require_once ('classes/Email.php');


global $con;

$errors = [];
extract($_POST);

$selectAllProducts = Email::selectAllEmails();
  
