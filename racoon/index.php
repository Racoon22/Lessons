<?php

$text = '123';
while ($i <= strlen($text)) {
$i = 0;    
$summ = substr($text, $i, 1) + $i;
$i++;    
}
echo $summ;

