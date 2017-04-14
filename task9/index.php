<?php

include 'config.php';
include 'smartyconfig.php';

$ad = $_POST;

if ($_GET['action'] == 'show') {
    $id = (int) $_GET['id'];
    $select_ads = mysql_query("SELECT * FROM ads WHERE id=$id") or die("Ошибка" . mysql_error());
    $show_ads = mysql_fetch_assoc($select_ads);
}

$button_add_ads = !isset($_GET['id']) ? 'Новое объявление' : "Сохранить объявление";
if ($_POST['add_ads'] === "Новое объявление" && !isset($_GET['action'])) {

    mysql_query("INSERT INTO `ads` (`private`, `seller_name`, `email`, `phone`, `sity_id`, `category_id`, `title`, `description`, `price`, `allow_mails`) VALUES ('" . $ad['private'] . "', '" . $ad['seller_name'] . "', '" . $ad['email'] . "', '" . $ad['phone'] . "', '" . (int) $ad['sity_id'] . "', '" . (int) $ad['category_id'] . "', '" . $ad['title'] . "', '" . $ad['description'] . "', '" . $ad['price'] . "', '" . $ad['allow_mails']['0'] . "')") or die('Ошибка' . mysql_error());

    header("Location: index.php");
} elseif (isset($_POST['add_ads']) == 'Сохранить объявление') {
//редактирование объявления
    $id = (int) $_POST['id'];
    $allow_mail = '0';
    if (isset($ad['allow_mails'])) {
        $allow_mail = '1';
    }

    mysql_query("UPDATE ads set 
        seller_name='" . $ad['seller_name'] . "', 
        email='" . $ad['email'] . "',
        private='" . (int) $ad['private'] . "',
        phone='" . $ad['phone'] . "', 
        sity_id='" . (int) $ad['sity_id'] . "',
       category_id='" . (int) $ad['category_id'] . "',
        title='" . $ad['title'] . "', 
        description='" . $ad['description'] . "',
        price='" . $ad['price'] . "',
        allow_mails='" . $allow_mail . "' WHERE id=$id") or die("Ошибка" . mysql_error());
    header("Location: index.php");
}

//удаление объявления
if ($_GET['action'] == 'delete') {
    $id = (int) $_GET['id'];
    mysql_query("DELETE FROM ads WHERE id=$id") or die("Ошибка" . mysql_error());
    header("Location: index.php");
}
//записывание обратно в файл после операций с данными


$smarty->assign('ad', $show_ads);

$smarty->assign('allow_mails_id', $allow_mail);

//Кнопка ввода
$smarty->assign('add_ads_id', $button_add_ads);

$rs = mysql_query("SELECT id, title, price, seller_name FROM ads order by id");

while ($rows = mysql_fetch_assoc($rs)) {
    $db_ads[] = $rows;
}
$db_ads = array_combine(range(1, count($db_ads)), $db_ads);


if (isset($db_ads)) {
//$db_ads = array_combine(range(1, count($db_ads)), $db_ads);  
    $smarty->assign('ads', $db_ads);
}

$smarty->display('index.tpl');
?>