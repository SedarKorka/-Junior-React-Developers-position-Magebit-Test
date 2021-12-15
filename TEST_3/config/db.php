<?php
try {
    $con = new PDO(TYPE.':host='.HOST.'; dbname='.DBNAME.'; port='.PORT.'; charset='.CHARSET, USER, PASSWD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $ex) {
    require_once ('views/internal.view.php');
}