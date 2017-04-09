<?php
session_start();

// Блок функций
function show_city_block($point) {
    $citys = array('Москва', 'Новосибирск', 'Барабинск', 'Бердск', 'Искитим');
    foreach ($citys as $number => $city) {
        if ($number == $point) {
            echo '<option selected value="' . $number . '">' . $city . '</option>';
        } else {
            echo '<option value="' . $number . '">' . $city . '</option>';
        }
    }
}

function show_category_block($point) {
    $category = array('Товары для взрослых', 'Транспорт', 'Недвижимость', 'Услуги', 'Личные вещи', 'Для дома и дачи', 'Бытовая электроника', 'Хобби и отдых');
    foreach ($category as $number => $item) {
        if ($number == $point) {
            echo '<option selected value="' . $number . '">' . $item . '</option>';
        } else {
            echo '<option value="' . $number . '">' . $item . '</option>';
        }
    }
}

//запись нового обновления

if ($_POST['add_ads'] == "Новое объявление") {
    $_SESSION['ads'][] = $_POST;
    header("Location: dz6.php");
} elseif (isset($_POST['add_ads']) == 'Сохранить объявление') {
    //редактирование объявления
    $_SESSION['ads'][$_POST['id']] = array_replace($_SESSION['ads'][$_POST['id']], $_POST);
    if (isset($_SESSION['ads'][$_POST['id']]['allow_mails']) && !isset($_POST['allow_mails'])) {
        unset($_SESSION['ads'][$_POST['id']]['allow_mails']);
    }
    header("Location: dz6.php");
    //удаление объявления
} elseif ($_GET['action'] == 'delete') {
    unset($_SESSION['ads'][$_GET['id']]);
    header("Location: dz6.php");
}

function show($point) {
    if ($_GET['action'] == 'show') {
        echo $point;
    }
}

// Если мы заполняем объявление предлагается его создать, если просматриваем, предлагаеться сохранить.
if (!isset($_GET['id']) || ($_GET['action']) == 'delete') {
    $button_add_ads = "Новое объявление";
} else {
    $button_add_ads = "Сохранить объявление";

    $ad = $_SESSION['ads'][$_GET['id']];
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Интернет ларёк</title>
    </head>
    <body>
        <form action="dz6.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <label class="form-label-radio"><input type="radio" value="1" name="private" <?php echo $ad['private'] == '1' ? 'checked' : '' ?> >Частное лицо</label> <label class="form-label-radio"><input type="radio" value="0" name="private" <?php echo $ad['private'] == '0' ? 'checked' : '' ?>>Компания</label>
            <p><label><b id="your-name">Ваше имя</b></label>
                <input type="text" maxlength="40" class="form-input-text" value="<?php show($ad['seller_name']) ?>" name="seller_name" id="fld_seller_name"</input></p>                       
            <p><label for="fld_email" class="form-label">Электронная почта</label>
                <input type="text" class="form-input-text" value="<?php show($ad['email']) ?>" name="email" id="fld_email"></p>
            <p><label id="fld_phone_label" for="fld_phone" class="form-label">Номер телефона</label>
                <input type="text" class="form-input-text" value="<?php show($ad['phone']) ?>" name="phone" id="fld_phone"></p>           

            <label for="fld_category_id" class="form-label">Выбирете город</label>
            <select title="Выберите Ваш город" name="location_id" id="region" class="form-input-select"> 
                <option value="">-- Выберите город --</option>
                <?php show_city_block($ad['location_id']); ?>                 
        </select>
        <p><label for="fld_category_id" class="form-label">Категория</label> 
            <select title="Выберите категорию объявления" name="category_id" id="fld_category_id" class="form-input-select"> 
                <option value="">-- Выберите категорию --</option>
               <?php show_category_block($ad['category_id']); ?>
        </select>
    <p><label for="fld_title" class="form-label">Название объявления</label> 
        <input type="text" maxlength="50" class="form-input-text-long" value="<?php show($ad['title']) ?>" name="title" id="fld_title"></p>

    <p><label for="fld_description" class="form-label" id="js-description-label">Описание объявления</label> 
        <textarea maxlength="6000" name="description" id="fld_description" class="form-input-textarea"><?php show($ad['description']) ?></textarea></p> 

    <label id="price_lbl" for="fld_price" class="form-label">Цена</label> 
    <input type="text" maxlength="9" class="form-input-text-short" value="<?php show($ad['price']) ?>" name="price" id="fld_price">&nbsp;<span>руб.</span> 
    <p> <label class="form-label-checkbox" for="allow_mails"> <input type="checkbox" value="1" name="allow_mails" id="allow_mails" class="form-input-checkbox"<?php echo (isset($ad['allow_mails'])) ? 'checked' : '' ?>><span class="form-text-checkbox">Я не хочу получать вопросы по объявлению по e-mail</span> </label></p>
    <p><input type="submit" value="<?php echo $button_add_ads ?>" id="form_submit" name="add_ads" class="vas-submit-input"></p></form>
<?php
//вывод таблицы объявлений
if (!empty($_SESSION['ads'])) {

    echo '<h1>Объявления</h1>
        <table width="100%" cellspacing="0" cellpadding="4" border="1">
            <thead>
            <td align = center>Название</a></td>
            <td align = center>Стоимость</td>
            <td align = center>Имя продовца</td>
            <td align = center>Удалить объявление</td>
            </thead>';
    foreach ($_SESSION['ads'] as $key => $params) {

        echo '<tr><td align = center height=50><a href =?action=show&id=' . $key . '>' . $params['title'] . '</a></td>
                  <td align = center>' . $params["price"] . '</td>
                  <td align = center>' . $params["seller_name"] . '</td>   
                  <td align = center><a href ="?action=delete&id=' . $key . '">' . Удалить . '</a></td></tr>';
    }
}
?>