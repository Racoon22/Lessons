<?php

//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//ini_set('display_errors', 1);
//header("Content-Type: text/html; charset=utf-8");

include 'config.php';
include 'smartyconfig.php';

class ads {

    public $id = '';
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

    public function __construct($ad) {
        if (isset($ad['id'])) {
            $this->id = $ad['id'];
        }
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

    public function save() {
        global $db;
        $vars = get_object_vars($this);
        $db->query('REPLACE INTO ads(?#) VALUES(?a)', array_keys($vars), array_values($vars));
    }

    public function delete() {
        global $db;
        $db->query($db->query('DELETE FROM ads WHERE id=?', $_GET['id']));
    }
    public function getId() {
        return $this->id;
 }
//    public function getName() {
//        return $this->name;
//    }
//    public function getDesc() {
//        return $this->desc;
    

}

class AdsStore {

    private static $instance = NULL;
    private $ads = array();

    public static function instance() {
        if (self::$instance == NULL) {
            self::$instance = new AdsStore();
        }
        return self::$instance;
    }

    public function addAds(Ads $ads) {
        if (!($this instanceof AdsStore)) {
            die('Нельзя использовать этот метод в конструкторе классов');
        }
        $this->ad[$ads->getId()] = $ad;
    }

    public function getAllAdsFromDb() {
        global $db;
        $all = $db->select('select * from ads');
        foreach ($all as $value) {
            $ad = new Ads($value);
            self::addAds($ad); //помещаем объекты в хранилище
        }
        return self::$instance;
    }

    public function prepareForOut() {
        global $smarty;
        $row = '';
        foreach ($this->ads as $value) {
            $smarty->assign('ad', $value);
            $row .= $smarty->fetch('table_row.tpl.html');
        }
        $smarty->assign('ads_rows', $row);
        return self::$instance;
    }

    public function display() {
        global $smarty;
        $smarty->display('index.tpl');
    }

}
//isset($_POST['name']) &&
if (isset($_POST['title'])) {
    $ad = new Ads($_POST);
    $ad->save();
}

class SubmitButton {
    private static $instance=NULL;
  public static function instance() {
        if(self::$instance == NULL){
            self::$instance = new SubmitButton();
   }
  }
    function SubmitButton() {
        global $smarty;
        $button_add_ads = !isset($_GET['id']) ? 'Новое объявление' : "Сохранить объявление";
        return $smarty->assign('add_ads_id', $button_add_ads);;
    }
  
}

$button_add_ads = new SubmitButton;
$button_add_ads->SubmitButton();
$store = new AdsStore;
$store ->getAllAdsFromDb();
$store ->prepareForOut();
$store ->display();

//$smarty->display('OOP.tpl');
//class ActionAds {
//
//    function InsertAds($ads, $db) {
//        $ads = (array) $ads;
//        if ($_POST['add_ads'] === "Новое объявление") {
//            $db->query('INSERT INTO ?_ads SET ?a', $ads);
//        } elseif ($_POST['add_ads'] === "Сохранить объявление") {
//            $id = (int) $_POST['id'];
//            $db->query('UPDATE ?_ads SET ?a WHERE id=?', $ads, (int) $_POST['id']);
//        } elseif (isset($_GET['action'])) {
//            switch ($_GET['action']) {
//                case 'show':
//                    $show_ads = $db->selectRow('SELECT * FROM ads WHERE id=?', $_GET['id']);
//                    break;
//                case 'delete':
//                    $db->query('DELETE FROM ads WHERE id=?', $_GET['id']);
//                    header("Location: index.php");
//                    break;
//            }
//        }
//        return $show_ads;
//    }
//
//}
//
//$ad = $_POST;
//$ads = new ads((int) $ad['private'], $ad['seller_name'], $ad['email'], $ad['phone'], (int) $ad['sity_id'], (int) $ad['category_id'], $ad['title'], $ad['description'], $ad['price'], (int) $ad['allow_mails']);
//
//$action = new ActionAds();
//$show_ads = $action->InsertAds($ads, $db);
//
//$button_add_ads = new SubmitButton;
//$button_add_ads = $button_add_ads->SubmitButton();
//
//$show_table = new ShowTable($db);
//$rows = $show_table->showtable($db);
//
//$smarty->assign('show_ads', $show_ads);

//$smarty->assign('ads', $rows);
//$smarty->display('index.tpl');
//?>