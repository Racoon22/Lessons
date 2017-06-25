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
            $this->id = (int) $row['id'];
        }
        $this->seller_name = trim(htmlspecialchars($row['seller_name']));
        $this->private = trim(htmlspecialchars($row['private']));
        $this->title = trim(htmlspecialchars($row['title']));
        $this->price = trim(htmlspecialchars($row['price']));
        $this->email = trim(htmlspecialchars($row['email']));
        $this->phone = trim(htmlspecialchars($row['phone']));
        $this->sity_id = trim(htmlspecialchars($row['sity_id']));
        $this->category_id = trim(htmlspecialchars($row['category_id']));
        $this->description = trim(htmlspecialchars($row['description']));

        if (isset($row['allow_mails']) && ($row['allow_mails'][0] == 1)) {
            $this->allow_mails = 1;
        } else {
            $this->allow_mails = 0;
        }
    }

    public function AddAd() {
        global $db;
        $vars = get_object_vars($this);
        $id = $db->query("INSERT INTO ads (?#) VALUES (?a)", array_keys($vars), array_values($vars));
        return $id;
    }

    public function UpAd() {
        global $db;
        $vars = get_object_vars($this);
        return $db->query('UPDATE ?_ads SET ?a WHERE id=?', $vars, $_POST['id']);
        ;
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
        $all = $db->query('select * from ads order by id');
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
        if (isset($this->ads[$id])) {
            $show_ads = $this->ads[$id];
        } else {
            $show_ads = false;
        }
        return $show_ads;
// заполняем форму введенными значениями
    }

    public function showAllAds() {
        global $smarty;
        if (!empty($this->ads)) {
            foreach ($this->ads as $key => $value) {
                $showAll[] = get_object_vars($value);
            }
            $smarty->assign('ads', $showAll);
        }
        // выводим таблицу сообъявлениями
    }

    public static function DeleteAd($db, $id) {
        $show_ads = $this->ads[$id];
        $db->query('DELETE FROM ads WHERE id=?d', $id);
    }

}

class connectDataBase {

    private $db_server_name = '';
    private $db_password = '';
    private $db_user_name = '';
    private $db_name = '';

    function __construct($row) {

        $this->db_server_name = trim(htmlspecialchars($row['server_name']));
        $this->db_password = trim(htmlspecialchars($row['password']));
        $this->db_user_name = trim(htmlspecialchars($row['user_name']));
        $this->db_name = trim(htmlspecialchars($row['database']));
    }

    public function connectDb() {
        global $db;

        $db = DbSimple_Generic::connect("mysqli://" . $this->db_user_name . ":" . $this->db_password . "@" . $this->db_server_name . "/" . $this->db_name);
        if ($db->setErrorHandler('databaseErrorHandler')) {
            header("Location: instal.php");
        };
    }

    public function setDumpIntoDataBase() {
        global $db;

        $filename = 'test.sql';

        $templine = '';

        $lines = file($filename);

        foreach ($lines as $line) {

            if (substr($line, 0, 2) == '--' || $line == '')
                continue;


            $templine .= $line;

            if (substr(trim($line), -1, 1) == ';') {

                $db->query("$templine");

                unset($templine);
            }
        }
    }

    public function putSettingFile() { // Записываем параметры подключения в установочный файл
        $file_setting = 'setting.php';
        $string = "<?php \r\n"
                . "define('DB_USER','" . $this->db_user_name . "'); \r\n"
                . "define('DB_PASS','" . $this->db_password . "'); \r\n"
                . "define('DB_HOST','" . $this->db_server_name . "'); \r\n"
                . "define('DB_NAME','" . $this->db_name . "'); \r\n";
        if (!file_put_contents($file_setting, $string)) {
            installErrorHandler();
        }
    }

}

?>