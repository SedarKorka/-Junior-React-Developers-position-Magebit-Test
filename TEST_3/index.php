<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: text/html; charset=UTF-8');
require_once ('./config/config.php');
require_once ('./config/db.php');
require_once ('./functions/functions.php');
require_once ('./autoloader/Autoloader.php');

//Insertion de toutes les classes
use autoloader\Autoloader;

Autoloader::register();

//Vérification de la page





if (isset($_GET['page']) AND ! empty($_GET['page'])):
    $page = strtolower(trim($_GET['page']));
else:
    $page = 'addemail';
endif;

$allPagesControllers = scandir('controllers/', SCANDIR_SORT_NONE);
$allPagesViews = scandir('views/', SCANDIR_SORT_NONE);

if (in_array("{$page}.controller.php", $allPagesControllers) AND file_exists("./controllers/{$page}.controller.php")):
    if (in_array("{$page}.view.php", $allPagesViews) AND file_exists("./views/{$page}.view.php")):
        require_once ("./controllers/{$page}.controller.php");
        require_once ("./views/{$page}.view.php");
    else:
        error_page_redirect();
    endif;
else:
    error_page_redirect();
endif;


