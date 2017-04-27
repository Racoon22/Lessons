<?php

error_reporting(E_ERRORS|E_WANING|E_PARSE);
ini_set('display_errors', 1);


$project_root = $_SERVER['DOCUMENT_ROOT']; 

require_once $project_root."/dbsimple/config.php";
require_once $project_root."/dbsimple/DbSimple/Generic.php";
require_once $project_root."/FirePHPCore/FirePHP.class.php";

// Подключаемся к БД.
$db = DbSimple_Generic::connect('mysqli://root:yes@127.0.0.1/test');



// Устанавливаем обработчик ошибок.
$db-> setErrorHandler('databaseErrorHandler');




function databaseErrorHandler($message, $info)
{
    // Если использовалась @, ничего не делать.
    if (!error_reporting()) return;
    // Выводим подробную информацию об ошибке.
    echo "SQL Error: $message<br><pre>"; 
    print_r($info);
    echo "</pre>";
    exit();
}


?>