<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE ); //| E_NOTICE
include 'connect.php';
include 'smartyconfig.php';
include 'Classes.php';


AdsStore::instance()->getAllAdsFromDb()->showAllAds();

$smarty->display('index.tpl');
?>