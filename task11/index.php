<?php

include 'config.php';
include 'smartyconfig.php';

class ads {

    public $private = '';
    public $seller_name = '';
    public $email = '';
    public $phone = '';
    public $sity_id = '';
    public $category_id = '';
    public $title = '';
    public $description = '';
    public $price = '';
    public $allow_mails = '';

    function __construct($private, $seller_name, $email, $phone, $sity_id, $category_id, $title, $description, $price, $allow_mails) {
        $this->private = $private;
        $this->seller_name = $seller_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->sity_id = $sity_id;
        $this->category_id = $category_id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->allow_mails = $allow_mails;
    }

}

class SubmitButton {

    function SubmitButton() {
        $button_add_ads = !isset($_GET['id']) ? 'Новое объявление' : "Сохранить объявление";
        return $button_add_ads;
    }

}

class ActionAds {

    function InsertAds($ads, $db) {
        $ads = (array) $ads;
        if ($_POST['add_ads'] === "Новое объявление") {
            $db->query('INSERT INTO ?_ads SET ?a', $ads);
        } elseif ($_POST['add_ads'] === "Сохранить объявление") {
            $id = (int) $_POST['id'];
            $db->query('UPDATE ?_ads SET ?a WHERE id=?', $ads, (int) $_POST['id']);
        } elseif (isset($_GET['action'])) {
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
        return $show_ads;
    }

}

class ShowTable {

    function showtable($db) {
        $rows = $db->select("SELECT id, title, price, seller_name FROM ads order by id");
        if (isset($rows)) {
            $rows = array_combine(range(1, count($rows)), $rows);
        }return $rows;
    }

}
if (isset($_POST)){
$ad = $_POST;
$ads = new ads((int) $ad['private'], $ad['seller_name'], $ad['email'], $ad['phone'], (int) $ad['sity_id'], (int) $ad['category_id'], $ad['title'],$ad['description'], $ad['price'], (int) $ad['allow_mails']);
$action = new ActionAds();
$show_ads = $action->InsertAds($ads, $db);
$smarty->assign('show_ads', $show_ads);
}
$button_add_ads = new SubmitButton;
$button_add_ads = $button_add_ads->SubmitButton();

$show_table = new ShowTable($db);
$rows = $show_table->showtable($db);


$smarty->assign('add_ads_id', $button_add_ads);
$smarty->assign('ads', $rows);
$smarty->display('index.tpl');
?>