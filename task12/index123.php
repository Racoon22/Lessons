<?php

//error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
//ini_set('display_errors', 1);
//header("Content-Type: text/html; charset=utf-8");


$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root . '/task12/smarty/';

require_once $project_root . "/dbsimple/config.php";
require_once $project_root . "/dbsimple/DbSimple/Generic.php";
require($smarty_dir . 'libs/Smarty.class.php');
require($project_root . '/task12/function.php');


$smarty = new Smarty;

$smarty->compile_check = true;
$smarty->debugging = false;
$smarty->template_dir = $smarty_dir . 'templates';
$smarty->compile_dir = $smarty_dir . 'templates_c';


$db = DbSimple_Generic::connect('mysqli://root:yes@127.0.0.1/test');
$db->setErrorHandler('databaseErrorHandler');
$db->query("SET NAMES UTF8");


class Ads {

    private $id;
    private $name;
    private $desc;
    private $type;

    public function __construct($ad) {
        if (isset($ad['id'])) {
            $this->id = $ad['id'];
        }
        $this->name = $ad['name'];
        $this->desc = $ad['desc'];
        $this->type = $ad['type'];
    }
public function save() {
        global $db;
        $vars = get_object_vars($this);
        $db->query('REPLACE INTO ad(?#) VALUES(?a)',  array_keys($vars),  array_values($vars));
}
public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function getType() {
        return $this->type;
    }

}

if(isset($_POST['name'])&&isset($_POST['desc'])){
    $ad=new Ads($_POST);
    $ad->save();
}

$smarty->display('oop.tpl');

?>