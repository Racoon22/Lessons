<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include 'config.php';
include 'smartyconfig.php';

class Ads {

    public $id = '';
    public $seller_name = '';
    public $title = '';
    public $price = '';

    function __construct($row) {

        $this->id = $row['id'];
        $this->seller_name = $row['seller_name'];
        $this->title = $row['title'];
        $this->price = $row['price'];
    }

    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getSellerName() {
        return $this->seller_name;
    }

//DbSimple_Generic
    public static function showtable($db) {
        global $smarty;
        $data = $db->select("SELECT id, title, price, seller_name FROM ads order by id");
        if (!empty($data)) {
            $allAds = array();
            foreach ($data as $row) {
                $allAds[] = new Ads($row);
            }
            return $smarty->assign('ads', $allAds);
        }
    }

}

class Ad extends Ads {

    public $private = '';
    public $email = '';
    public $phone = '';
    public $sity_id = '';
    public $category_id = '';
    public $description = '';
    public $allow_mails = '';

    function __construct($row) {
        parent::__construct($row);
        $this->private = (isset($row['private'])) ? $row['private'] : 0;
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

    public static function AddAd($db, $from_post) {
        $ad = new Ad($from_post);
        $new_ad = get_object_vars($ad);
        $db->query("INSERT INTO ads (?#) VALUES (?a)", array_keys($new_ad), array_values($new_ad));
    }

    public static function UpAd($db, $from_post, $id) {
        $ad = new Ad($from_post);
        $new_ad = get_object_vars($ad);
        $db->query("UPDATE ads SET ?a WHERE id = ?d", $new_ad, $id);
    }

    public static function DeleteAd($db, $id) {
        $db->query('DELETE FROM ads WHERE id=?d', $id);
    }

    public static function ShowAd($db, $id) {
        $data = $db->selectRow('SELECT * FROM ads WHERE id=?d', $id);
        $oneAd = new Ad($data);
        return $oneAd;
    }

}

$post = $_POST;
if (isset($_POST['add_ads']) && empty($_POST['id'])) {
    unset($post['add_ads']);
    Ad::AddAd($db, $post);
    header("Location: index.php");
} elseif (isset($_POST['add_ads']) && !empty($_POST['id'])) {
    unset($post['add_ads']);
    Ad::UpAd($db, $post, $post['id']);
    header("Location: index.php");
} elseif (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'show':
            $show_ads = Ad::ShowAd($db, $_GET['id']);
            $smarty->assign('show_ads', $show_ads);
            break;
        case 'delete':
            Ad::DeleteAd($db, $_GET['id']);
            header("Location: index.php");
            break;
    }
}
Ads::showtable($db);


$smarty->display('index.tpl');
?>