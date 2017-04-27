<?php

    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE); //
include 'config.php';
include 'smartyconfig.php';
include 'Classes.php';



if (isset($_POST['add_ads'])) {
    $ad = new Ads($_POST);
    $ad->AddAd();
    header("Location: index.php");
} elseif (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'delete':
//           Ads::DeleteAd($db, $_GET['id']);

            break;
        case 'show':
            AdsStore::instance()->getAllAdsFromDb()->showSingleAd($_GET['id']);
            break;
    }
}

    AdsStore::instance()->getAllAdsFromDb()->showAllAds();

$smarty->display('index.tpl');
?>