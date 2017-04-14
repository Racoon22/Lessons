<?php

class ShopProduct {

    public $title = 'Телефон';
    public $seller_name = 'Имя продавца';
    public $price = 0;

    function __construct($title, $seller_name, $price) {
        $this->title = $title;
        $this->seller_name = $seller_name;
        $this->price = $price;
        
        $writer =  ShopProductWriter::instanse();
        $writer ->  addProduct($this);
    }

    function GetProduser() {
        return $this->title . " " . $this->price . " " . $this->wight . "<br>";
    }

    function GetSummaryLine() {
        $base = $this->title . "(" . $this->seller_name . " " . $this->price . ")";
    }

}

class ItemProduct extends ShopProduct {

    public $wight = 'Вес';

    function __construct($title, $seller_name, $price, $wight) {
        parent::__construct($title, $seller_name, $price);
        $this->wight = $wight;
    }

    function GetProduser() {
        return $this->title . " " . $this->price . " " . $this->wight . "<br>";
    }

    function GetSummaryLine() {
        $base =  $base = parent::GetSummaryLine();
        $base .= "Вес: " . $this->wight . "<br>";
        return $base;
    }

}

class ServiceProduct extends ShopProduct {

    public $time = 'Время';

    function __construct($title, $seller_name, $price, $time) {
        parent::__construct($title, $seller_name, $price);
        $this->time = $time;
    }

    function GetProduser() {
        return $this->title . " " . $this->price . " " . $this->time . "<br>";
    }

    function GetSummaryLine() {
        $base = parent::GetSummaryLine();
        $base .= "Время услуги: " . $this->time . "<br>";
        return $base;
    }

}

class ShopProductWriter {

public $product = array(); 
public static $instanсe = NULL;
public static function instanse() {
    if (self::$instanсe == NULL){
        self::$instanсe = new ShopProductWriter();
    }
    return self::$instanсe;
}
public function addProduct(ShopProduct $shopProduct) {
    if (!($this instanceof ShopProductWriter)){
        die('Ошибка,бля!');
    }
    $this ->product[] = $shopProduct;
    } 

    public function write() {
$str = '';
foreach ($this ->product as $ShopProduct)
echo  $ShopProduct->seller_name . ": " . $ShopProduct->GetProduser();
       
        }
        
    }



$product1 = new ItemProduct("Комп2", "Саша", 25000, "2,5 кг");
$product2 = new ServiceProduct("Минет2", "Маша", 2000, "1 час");

$writer =  ShopProductWriter::instanse();
var_dump($writer);
$writer->write();
?>