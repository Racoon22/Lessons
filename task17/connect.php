<?php

$project_root = $_SERVER['DOCUMENT_ROOT']; 

require_once $project_root."/dbsimple/config.php";
require_once $project_root."/dbsimple/DbSimple/Generic.php";


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
function connectError() {
    
    header("Location: instal.php");
}

$file_setting="setting.php";

if (!file_exists($file_setting)){
    connectError();
    
}
require_once ($file_setting);
if (defined('DB_USER') && defined('DB_PASS') && defined('DB_HOST') && defined('DB_NAME')){
    // Подключаемся к БД.
    $db = DbSimple_Generic::connect('mysqli://'.DB_USER.':'.DB_PASS.'@'.DB_HOST.'/'.DB_NAME);
    $db->setErrorHandler('databaseErrorHandler');

     //Проверка на существование таблиц в базе
    $check_table['ads'] = $db->query("SHOW TABLES LIKE 'ads'");
    $check_table['category'] = $db->query("SHOW TABLES LIKE 'category'");
    $check_table['sity'] = $db->query("SHOW TABLES LIKE 'sity'");
    $check_table['private'] = $db->query("SHOW TABLES LIKE 'private'");
   if (!$check_table['ads']  && !$check_table['category'] && !$check_table['sity'] && !$check_table['private'] ) {
     connectError();
   }
} else{
    connectError();
}