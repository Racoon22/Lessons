<?php

class Ads {

    public $private = '';
    public $id = '';
    public $seller_name = '';
    public $title = '';
    public $price = '';
    public $email = '';
    public $phone = '';
    public $sity_id = '';
    public $category_id = '';
    public $description = '';
    public $allow_mails = '0';

    function __construct($row) {

        if (isset($row['id'])) {
            $this->id = $row['id'];
        }
        $this->seller_name = $row['seller_name'];
        $this->private = $row['private'];
        $this->title = $row['title'];
        $this->price = $row['price'];
        $this->email = $row['email'];
        $this->phone = $row['phone'];
        $this->sity_id = $row['sity_id'];
        $this->category_id = $row['category_id'];
        $this->description = $row['description'];
        if (isset($row['allow_mails']) && ($row['allow_mails'][0] == 1)) {
            $this->allow_mails = 1;
        } else {
            $this->allow_mails = 0;
        }
    }

    public function AddAd() {
        global $db;
        $vars = get_object_vars($this);
        $db->query("REPLACE INTO ads (?#) VALUES (?a)", array_keys($vars), array_values($vars));
    }

    public static function DeleteAd($db, $id) {
        $db->query('DELETE FROM ads WHERE id=?d', $id);
    }

}

//DbSimple_Generic
class AdsPrivate extends Ads {

    public $private = '0';

    function __construct($row) {
        parent::__construct($row);
    }

}

class AdsCompany extends Ads {

    public $private = '1';

    function __construct($row) {
        parent::__construct($row);
    }

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

    public function addAds(Ads $ad) {
        if (!($this instanceof AdsStore)) {
            die('Нельзя использовать этот метод в конструкторе классов');
        }
        $this->ads[$ad->id] = $ad;
    }

    public function getAllAdsFromDb() {
        global $db;
        $all = $db->select('select * from ads order by id');
        foreach ($all as $value) {
            switch ($value['private']) {
                case 0 : // Частное объявление
                    $ad = new AdsPrivate($value);
                    break;
                case 1 : // Объявление компании
                    $ad = new AdsCompany($value);
                    break;
            }
            self::addAds($ad); //помещаем объекты в хранилище
        }
        return self::$instance;
    }

    public function showSingleAd($id) {
        global $smarty;
        $show_ads = $this->ads[$id];
        $smarty->assign('show_ads', $show_ads); // заполняем форму введенными значениями
    }

    public function showAllAds() {
        global $smarty;
        foreach ($this->ads as $key => $value) {
            $showAll[] = get_object_vars($value);
        }
        $smarty->assign('ads', $showAll);
        // выводим таблицу сообъявлениями
    }

}

?>