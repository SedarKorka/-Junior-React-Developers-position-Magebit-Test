<?php

//Demarrage de la session
session_start();
// ini_set('session.cookie_lifetime', TRUE);
setlocale(LC_TIME, 'fr_FR.utf8', 'fr');
//strftime('%d, %B %G %Hh', strtotime($get->timestamp))
// ini_set('session.save_handler', 'mm');
ini_set('output_handler', 'mb_output_handler');
ini_set("xdebug.var_display_max_depth", -1);
ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);

//A enlever lors du deploiement
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

error_reporting(-1);

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");

ini_set('zlib.output_compression', 0);
ini_set('output_buffering', 0);
ini_set('implicit_flush', 1);

// Configuration de l'accès à la base de données
define('TYPE', 'mysql');
define('HOST', 'localhost');
define('DBNAME', 'testmagibte');
define('PORT', 3306);
define('CHARSET', 'utf8');
define('USER', 'root');
define('PASSWD', '');

//Paths
define('LOCALHOST', $_SERVER['SERVER_NAME']);

define('PATH_REQUIRED', substr($_SERVER['SCRIPT_FILENAME'], 0, -9));

define('PATH', substr($_SERVER['PHP_SELF'], 0, -9));

define('LINK', 'http://' . LOCALHOST . PATH);
define('LINKNOS', 'http://' . LOCALHOST . PATH);

//define('LINK', 'https://' . LOCALHOST . PATH);
//define('LINKNOS', 'https://' . LOCALHOST . PATH);

// Website configuration

define('AUTHOR', 'KORKA');
define('SITE_NAME', 'SAVE-FILE');

define('ICON', LOCALHOST . PATH . '');
//Languages
define('DEFAULT_LANGUAGE', 'en');

