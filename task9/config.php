<?php

$conn = mysql_connect('localhost', 'root','yes') or die("Невозможно установить соединение: ". mysql_error());
//echo "Соединение установлено<br>";

$db_test = mysql_select_db('test', $conn) or die("Невозможно установить соединение: ". mysql_error());
//echo "Базы данных подключены<br>";
?>