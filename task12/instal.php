<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE); 
//include 'config.php';


//$user_name = $_POST['user_name'];
//$password = $_POST['password'];
//$server_name = $_POST['server_name'];
//$database = $_POST['database'];
//$filename = 'test.sql';


if (!empty($_POST)) {
// Name of the file
$filename = 'test.sql';
// MySQL host
$mysql_host = $_POST['server_name'];
// MySQL username
$mysql_username = $_POST['user_name'];
// MySQL password
$mysql_password = $_POST['password'];
// Database name
$mysql_database = $_POST['database'];

// Connect to MySQL server
mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file('test.sql');
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    unset ($templine);
}
}
 include "index.php";
 exit();
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



