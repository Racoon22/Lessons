<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE); // | E_NOTICE

include 'Classes.php';
include 'config.php';


if (!empty($_POST)) {

    $connect = new connectDataBase($_POST);
    If ($connect->connectDb());
    $connect->setDumpIntoDataBase();
    $connect->putSettingFile($file_setting);
    header("Location: index.php");
    
}   

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



