<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE); //

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
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$server_name = $_POST['server_name'];
$database = $_POST['database'];

// Подключаемся к БД.
$db = DbSimple_Generic::connect("mysqli://$user_name:$password@$server_name/$database");
//$db = DbSimple_Generic::connect('mysqli://root:yes@127.0.0.1/test');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Тег form</title>
    </head>
    <body>
        <form action="instal.php" method="POST">
        <p><label>SERVER NAME:
            <input type="text" name="server_name" placeholder="SERVER NAME"> </label><p>
                    <p><label>USER NAME:
            <input type="text" name="user_name" placeholder="USER NAME"> </label><p>
                    <p><label>PASSWORD:
            <input type="text" name="password" placeholder="PASSWORD"> </label><p>
                   <p><label>DATABASE:
            <input type="text" name="database" placeholder="DATABASE"> </label><p>
                   <p><input type="submit" name="GO" value="GO"> </label><p>

    </body>
</html>
