<?php

    class Email
    {
        private $email;

        public function __construct($email){
            $this->email = $email; 
        }

        public static function selectByEmail($email){
            global $con;
            $re = $con->prepare("SELECT * FROM email WHERE email=:email");
            $re->bindParam(":email",$email);
            $re->execute();

            $resultat = [];
            while ($row = $re->fetchObject()) {
                array_push($resultat,$row);
            }
            return $resultat;
        }
        public static function selectEmailLike($element){
            global $con;
            $re = $con->prepare("SELECT * FROM email WHERE email LIKE '%$element%' OR date_added LIKE '%$element%' "); 
            $re->execute();

            $resultat = [];
            while ($row = $re->fetchObject()) {
                array_push($resultat,$row);
            }
            return $resultat;
        }
        
        public static function selectAllEmails(){
            global $con;
            $re = $con->prepare("SELECT * FROM email ORDER BY date_added DESC");
            $re->execute();
            $resultat = [];

            while ($rows = $re->fetchObject()) {
                array_push($resultat,$rows);
            }

            return $resultat;
        }




        public static function add_email($email){
            global $con;
            $re = $con->prepare("INSERT INTO email SET email=:email");
            $re->bindParam(':email',$email); 

            $re->execute();
        }
        public static function delete_email($id){
            global $con;
            $re = $con->prepare("DELETE FROM `email` WHERE id=:id");
            $re->bindParam(':id',$id); 

            $re->execute();
        }
    }
    

?>