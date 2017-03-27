<?php 


$cook_val = $_GET;
$cook_val2 = serialize($cook_val);
    
setcookie('name2', $cook_val2);

$get_cook = unserialize($_COOKIE['name2']);

print_r($get_cook);
print_r($_GET);

?>