<?php
 
require_once ('../config/config.php');
require_once ('../config/db.php');
require_once ('../functions/functions.php');
require_once ('../classes/Email.php');


global $con;

$errors = [];
extract($_POST);

   
    
   if ($element =="") {
        $selectAllEmails = Email::selectAllEmails();
        $i=0;
        foreach($selectAllEmails as $el){
            
            
               echo "<tr>
                    <td>".$el->id."</td>
                    <td>".$el->email."</td>
                    <td>".$el->date_added."</td>
                    <td><a href=delete/".$el->id.">Delete<a></td> </tr>";
        }
   } else {
    $selectAllEmails = Email::selectEmailLike($element);
    foreach($selectAllEmails as $el){
        $i=0;
        $n = $i+1;
           echo "<tr>
                <td>".$n."</td>
                <td>".$el->email."</td>
                <td>".$el->date_added."</td>
                <td><a href=delete/".$el->id.">Delete<a></td> </tr>";
    }
   }
   
     
   

