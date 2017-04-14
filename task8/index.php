<?php

include 'config.php';
include 'smartyconfig.php';

if (isset($_GET['id'])) {
$id = (int)$_GET['id'];    
}

$button_add_ads = !isset($_GET['id'])?'Новое объявление' : "Сохранить объявление"; 
if ($_POST['add_ads'] === "Новое объявление" && !isset($_GET['action'])) {
   $ad[] = $_POST;
    header("Location: index.php");
} elseif (isset($_POST['add_ads']) == 'Сохранить объявление') {
//редактирование объявления
   $ad[$_POST['id']] = array_replace($ad[$_POST['id']], $_POST);
   if (isset($ad[$_POST['id']]['allow_mails']) && !isset($_POST['allow_mails'])) {
        unset($ad[$_POST['id']]['allow_mails']);
   }  
    header("Location: index.php");
}

//удаление объявления
if ($_GET['action'] == 'delete') {
    unset($ad[$_GET['id']]);
    header("Location: index.php");
}
//записывание обратно в файл после операций с данными
file_put_contents($filename, serialize($ad));


//$ads = $ad[$id];

$smarty->assign('private_id', $ad[$id]['private']);

//Имя 
$smarty->assign('seller_name', $ad[$id]['seller_name']);
//Почта 
$smarty->assign('email', $ad[$id]['email']);
//Телефон
$smarty->assign('phone', $ad[$id]['phone']);

//Город
$smarty->assign('city_id', $ad[$id]['sity_id']);
//Категория

$smarty->assign('category_id', $ad[$id]['category_id']);

//Название
$smarty->assign('title', $ad[$id]['title']);
//Описание
$smarty->assign('description', $ad[$id]['description']);
//Цена
$smarty->assign('price', $ad[$id]['price']);
//Получение писем

$smarty->assign('allow_mails_id', $ad[$id]['allow_mails']);

//Кнопка ввода
$smarty->assign('add_ads_id', $button_add_ads);


if (isset($ad)){
$smarty->assign('ads', $ad);
}

$smarty->display('index.tpl');
?>