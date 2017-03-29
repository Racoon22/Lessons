<?php

// Блок функций
function show_city_block($point) {
    $citys = array('', 'Новосибирск', 'Барабинск', 'Бердск', 'Искитим');
    foreach ($citys as $number => $city) {
        if ($number == $point) {
            echo '<option selected value="' . $number . '">' . $city . '</option>';
        } else {
            echo '<option value="' . $number . '">' . $city . '</option>';
        }
    }
}

function show_category_block($point) {
    $category = array('', 'Транспорт', 'Недвижимость', 'Услуги', 'Личные вещи', 'Для дома и дачи', 'Бытовая электроника', 'Хобби и отдых');
    foreach ($category as $number => $item) {
        if ($number == $point) {
            echo '<option selected value="' . $number . '">' . $item . '</option>';
        } else {
            echo '<option value="' . $number . '">' . $item . '</option>';
        }
    }
}

//запись в масиив, что бы не мешал GET и кнопка добавления нового объявления

if (!isset($_GET['id']) && !isset($_POST['new_ads']) && $_POST['add_ads']=="Опубликовать") {
   
     $get_cookie=unserialize($_COOKIE['ads']);
    
     $get_cookie[] = $_POST;
     foreach ($get_cookie as $key => $value) {
          setcookie($key, serialize($get_cookie), time()+7*24*60*60);
     }
             
      
     header("Location: dz7.php");
     
    
     

}
print_r(unserialize($_COOKIE['0']));
//вставка параметра в форму через функцию show
function show($point) {
    if ($_GET['action'] == 'show') {
        echo $point;
    }
}

//удаление элемента массива
function delete($point) {
    if (($_GET['action'] == 'delete')) {
        unset($_SESSION['ads'][$_GET['id']]);
    }
}

//блок переменных
$name = $get_cookie[$_GET['id']]['seller_name'];
$email = $get_cookie[$_GET['id']]['email'];
$phone = $get_cookie[$_GET['id']]['phone'];
$gorod = $get_cookie[$_GET['id']]['location_id'];
$items = $get_cookie[$_GET['id']]['category_id'];
$title = $get_cookie[$_GET['id']]['title'];
$description = $get_cookie[$_GET['id']]['description'];
$price = $get_cookie[$_GET['id']]['price'];
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Интернет ларёк</title>
    </head>
    <body>
        <form action="dz7.php" method="POST">
            <label><b id="your-name">Ваше имя</b></label>
            <input type="text" maxlength="40" class="form-input-text" value="<?php show($name) ?>" name="seller_name" id="fld_seller_name"</input>                         
            <p><label for="fld_email" class="form-label">Электронная почта</label>
                <input type="text" class="form-input-text" value="<?php show($email) ?>" name="email" id="fld_email"></p>
            <p><label id="fld_phone_label" for="fld_phone" class="form-label">Номер телефона</label>
                <input type="text" class="form-input-text" value="<?php show($phone) ?>" name="phone" id="fld_phone"></p>           

            <label for="fld_category_id" class="form-label">Выбирете город</label>
            <select title="Выберите Ваш город" name="location_id" id="region" class="form-input-select"> 
                <option value="
                        ">-- Выберите город --</option>
                <option<?php show_city_block($gorod); ?>                 
        </select>
        <p><label for="fld_category_id" class="form-label">Категория</label> 
            <select title="Выберите категорию объявления" name="category_id" id="fld_category_id" class="form-input-select"> 
                <option value="">-- Выберите категорию --</option>
                <option<?php show_category_block($items); ?>
        </select>
    <p><label for="fld_title" class="form-label">Название объявления</label> 
        <input type="text" maxlength="50" class="form-input-text-long" value="<?php show($title) ?>" name="title" id="fld_title"></p>

    <p><label for="fld_description" class="form-label" id="js-description-label">Описание объявления</label> 
        <textarea maxlength="6000" name="description" id="fld_description" class="form-input-textarea"><?php show($description) ?></textarea></p> 

    <label id="price_lbl" for="fld_price" class="form-label">Цена</label> 
    <input type="text" maxlength="9" class="form-input-text-short" value="<?php show($price) ?>" name="price" id="fld_price">&nbsp;<span>руб.</span> 


<?php
    delete($id);
    // Если мы заполняем объявление предлагается его отправить, если просматриваем, предлагаеться добавить новое.
    if (!isset($_GET['id']) || ($_GET['action']) == 'delete') {
        echo '<p><input type="submit" value="Опубликовать" id="form_submit" name="add_ads" class="vas-submit-input"></p>';
    } else {
        echo '<p><input type="submit" value="Новое объявление" id="form_submit" name="new_ads" class="vas-submit-input"></p></form>';
    }
      
    //вывод таблицы объявлений
    if (!empty($get_cookie)) {

        echo '<h1>Объявления</h1>
        <table width="100%" cellspacing="0" cellpadding="4" border="1">
            <thead>
            <td align = center>Название</a></td>
            <td align = center>Стоимость</td>
            <td align = center>Имя продовца</td>
            <td align = center>Удалить объявление</td>
            </thead>';
        foreach ($get_cookie as $key => $params) {

            echo '<tr><td align = center height=50><a href =?action=show&id=' . $key . '>' . $params['title'] . '</a></td>
                  <td align = center>' . $params["price"] . '</td>
                  <td align = center>' . $params["seller_name"] . '</td>   
                  <td align = center><a href ="?action=delete&id=' . $key . '">' . Удалить . '</a></td></tr>';
        }
    }

    ?>