<?php

$conn = mysql_connect('localhost', 'root','') or die("Невозможно установить соединение: ". mysql_error());
echo "Соединение установлено<br>";

$ret = mysql_select_db('test', $conn) or die("Невозможно установить соединение: ". mysql_error());
echo "Базы данных подключены<br>";



$result = mysql_query( "SELECT * FROM ads WHERE id=4") or die("Ошибка". mysql_error());;



while ($row = mysql_fetch_assoc($result)) {
    print_r($row);
} 



?>