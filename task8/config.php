<?php
$filename = 'myfile.html';
if (!$handle = fopen($filename, 'a+')) {
    echo "Не могу открыть файл '$filename'";
    exit;
}

$content = file_get_contents($filename);
$ad = unserialize($content);
?>