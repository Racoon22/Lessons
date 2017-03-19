<?php
/*<h1>Корзина</h1>
    <table border="1">
    <thead>
  <tr>
    <td>Наимненование товаров</td>
    <td>Количесвто зааказов</td>
    <td>Остаток на складе</td>
    <td>Стоимость по наличию</td>
    <td>Скидка</td>
    <td>Стоимость со скидкой</td>
    <td colspan="5">Итого </td>
    
  </tr>
</table> 
 * 
 */


/*
 * Следующие задания требуется воспринимать как ТЗ (Техническое задание)
 * p.s. Разработчик, помни! 
 * Лучше уточнить ТЗ перед выполнением у заказчика, если ты что-то не понял, чем сделать, переделать, потерять время, деньги, нервы, репутацию.
 * Не забывай о навыках коммуникации :)
 * 
 * Задание 1
 * - Вы проектируете интернет магазин. Посетитель на вашем сайте создал следующий заказ (цена, количество в заказе и остаток на складе генерируются автоматически):
*/
$ini_string='
[Игрушка мягкая мишка белый]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[Одежда детская куртка синяя синтепон]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[Игрушка детская велосипед]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';
    
[Солдатики набор]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';

[Кукла Барби]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont'.  mt_rand(0, 2).';

';
$bd=  parse_ini_string($ini_string, true);

$info  = array('количество заказано'=>'0',
               'price_total'=>'0');

function parse_basket($basket){
    global $info;
    global $name;

 echo "  <h1>Корзина</h1>
<table border = 1>
  <thead>
    <td align = center>Наименование товара</td>
    <td align = center>Количество заказано, шт.</td>
    <td align = center>Остакток на складе, шт.</td>
    <td align = center>Цена, руб.</td>
    <td align = center>Скидка %</td>
    <td align = center>Цена со скидкой, руб.</td>
    
    <td align = center>Стоимость по наличию, шт.</td>
  </thead>";
    foreach ($basket as $name => $params) {
               
        
        echo "<tr><td align = center>$name</td>
                  <td align = center>" .$params['количество заказано']."</td>
                  <td align = center>". $params['осталось на складе']."</td>";
             
        
        //Для того чтобы в колонке стоимость по наличию правильно считалось количество товара.
       if ($params['количество заказано']>$params['осталось на складе']){
        
           $discount = discount($name, $params['цена'],$params['осталось на складе'],$params['diskont']);
           echo "<td align = center>".$params['цена']."</td>
                <td align = center>". $discount['skidka']."</td>
                <td align = center>". $discount['price']."</td>";
           $info['количество заказано'] = $info['количество заказано']+$params['количество заказано'];          
        }  else { $discount = discount($name, $params['цена'],$params['количество заказано'],$params['diskont']);
        
           echo "<td align = center>".$params['цена']."</td>
                <td align = center>". $discount['skidka']."</td>
                <td align = center>". $discount['price']."</td>
               <td align = center>". $discount['price_total']."</td></tr>";
           $info['количество заказано'] = $info['количество заказано']+$params['количество заказано'];      
     }
       
 
            // Вывожу из массива данные, что бы их в итог вставить
 
        
        $info['price_total'] = $info['price_total'] + $discount['price_total'];
        
    }
}

function attention($basket){
    foreach ($basket as $name => $params){
      surplus_item($name, $params['количество заказано'], $params['осталось на складе']);
      
}
}

function discount($name,$price,$amount,$diskont){
    if ($name == 'Игрушка детская велосипед' && $amount>=3 ) {
        
    $skidka = substr($diskont, 7, 2);
    // Скидка за одну позицию
    $price_with_diskont_per_item = $price - ($price*($skidka*10)/100) - ($price*(30)/100);
    // Общая цена с учетом цены за товар
    $total_price_all_items_with_discont = $amount*$price_with_diskont_per_item;    
    } else {
        $skidka = substr($diskont, 7, 2);
    // Скидка за одну позицию
    $price_with_diskont_per_item = $price - ($price*($skidka*10)/100);
    // Общая цена с учетом цены за товар
    $total_price_all_items_with_discont = $amount*$price_with_diskont_per_item;    
    }
      
    
       return array('skidka'=>$skidka."0%",
                 'price' =>  $price_with_diskont_per_item,
                 'price_total' => $total_price_all_items_with_discont );
}
//Функция которая выдает уведомления , если какого-либо товара нет на складе в необходимом количестве;
 function  surplus_item($name, $amount, $surplus){
     if ($amount>=$surplus){
            echo 'Сорян, товара '.$name.' меньше, чем вы хотите, есть только '.$surplus.' шт<br>';
     }
     
 }
 //Функция которая показывает скидку на велосипед, если есть покупается больше 3
  function diskont_bicycle($basket)  {
      foreach ($basket as $name => $params){
           

        if ($name == 'Игрушка детская велосипед' && $params['количество заказано']>$params['осталось на складе']  && $params['осталось на складе']>=3){
          echo '<h1>Скидка</h1><br>Вы заказали товара '.$name.'больше 3 шт. Вам предоставляется скидка 30%';
      }elseif ($name == 'Игрушка детская велосипед' && $params['количество заказано']<$params['осталось на складе']  && $params['количество заказано']>=3){
          echo "<h1>Скидка</h1><br>Вы заказали товара ".$name.'больше 3 шт. Вам предоставляется скидка 30%';
        }
  }
  }
parse_basket($bd);
echo "</table>";
?>
<h1>ИТОГО</h1>
<?php
$total_number_names = count($bd);
echo "Количество наименований товаров $total_number_names.<br>";
echo 'Наличие товаров '.$info['количество заказано'].' шт.<br>';
echo 'Итоговая сумма '.$info['price_total'].' руб.';

?>
<h1>Уведомления</h1>
<?php
attention($bd);

diskont_bicycle($bd);

?>
