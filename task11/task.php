<?php

$enternumber = 24;
$number = $enternumber;

function numbers($number) {
    global $result;
    global $enternumber;
    if (is_int($enternumber / $number)) {
        $result[] = $enternumber /$number;
        return $number;
    }
}

$ret = $number/$i;
for ( $i=2; !is_int($ret); ){
        $i++;
        $del = $i;
} 

for ( ; $i < $number;)
        {

    numbers($i);   
 
} 

$comma_separated = implode("*", $result);
echo $enternumber . '=' . $comma_separated;
?>