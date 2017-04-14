<?php

include 'config.php';
include 'smartyconfig.php';

$ad = $_POST;
if (isset($ad['allow_mails'])) {
    $ad['allow_mails'] = '1';
} else { 
    $ad['allow_mails'] = '0';
}
if (!isset($ad['private'])) {
    $ad['private'] = '0';
}
$ads = array(
    'private' => $ad['private'],
    'seller_name' => $ad['seller_name'],
    'email' => $ad['email'],
    'phone' => $ad['phone'],
    'sity_id' => $ad['sity_id'],
    'category_id' => $ad['category_id'],
    'title' => $ad['title'],
    'description' => $ad['description'],
    'price' => $ad['price'],
    'allow_mails' => $ad['allow_mails']);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'show':
            $show_ads = $db->selectRow('SELECT * FROM ads WHERE id=?', $_GET['id']);
            break;
        case 'delete':
            $db->query('DELETE FROM ads WHERE id=?', $_GET['id']);
            header("Location: index.php");
            break;
    }
}

$button_add_ads = !isset($_GET['id']) ? 'Новое объявление' : "Сохранить объявление";
if ($_POST['add_ads'] === "Новое объявление" && !isset($_GET['action'])) {

    $db->query('INSERT INTO ?_ads SET ?a', $ads);


    header("Location: index.php");
} elseif (isset($_POST['add_ads']) == 'Сохранить объявление') {
//редактирование объявления
    $id = (int) $_POST['id'];
    $db->query('UPDATE ?_ads SET ?a WHERE id=?', $ads, $id);
    header("Location: index.php");
}
$smarty->assign('show_ads', $show_ads);

//Кнопка ввода
$smarty->assign('add_ads_id', $button_add_ads);

//$rs = mysqli_query($conn, "SELECT id, title, price, seller_name FROM ads order by id");
$db->query("SELECT id, title, price, seller_name FROM ads order by id");


$rows = $db->select("SELECT id, title, price, seller_name FROM ads order by id");
$rows = array_combine(range(1, count($rows)), $rows);
if (isset($rows)) {

    $smarty->assign('ads', $rows);
}

$smarty->display('index.tpl');
?>