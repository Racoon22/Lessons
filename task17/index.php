<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE ); //| E_NOTICE
include 'connect.php';
include 'smartyconfig.php';
include 'Classes.php';


AdsStore::instance()->getAllAdsFromDb()->showAllAds();

$smarty->display('index.tpl');


$request = $_REQUEST;
/**
 * The uri is usually used to specify what the user wants from the API request.
 * Since in this example we specify both the word and the max_value, we will handle this with /api/Search?word=...
 */
$uri = $_SERVER['REQUEST_URI'];
/**
 * In general, it could be one of: GET, POST, PUT, DELETE
 * In this example we just use GET however
 */
$method = $_SERVER['REQUEST_METHOD'];
?>