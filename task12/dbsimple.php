<?php

$project_root = $_SERVER['DOCUMENT_ROOT']; 

require_once $project_root."/dbsimple/config.php";
require_once $project_root."/dbsimple/DbSimple/Generic.php";
require_once $project_root."/FirePHPCore/FirePHP.class.php";

// Подключаемся к БД. 
$db = DbSimple_Generic::connect('mysqli://root:yes@127.0.0.1/test');
$firePHP = FirePHP::getInstance(TRUE); 
$firePHP ->setEnabled(true);
// Устанавливаем обработчик ошибок.
$db-> setErrorHandler('databaseErrorHandler');

$db->setLogger('myLogger');

$myArray = array (
    'name' => '123'
);
//print_r($myArray);
$show_ads = $db->selectRow('SELECT * FROM ads WHERE id=?', 94);
// print_r($show_ads);

ob_start();
ob_get_contents($firePHP);


$firePHP -> log($myArray);

// Код обработчика ошибок SQL.
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

function myLogger($db, $sql, $caller)
{
  // Находим контекст вызова этого запроса.
   $tip = "at ".@$caller['file'].' line '.@$caller['line'];
  // Печатаем запрос (конечно, Debug_HackerConsole лучше).
  echo "<xmp title=\"$tip\">"; 
  print_r($sql); 
  echo "</xmp>";
}
?>